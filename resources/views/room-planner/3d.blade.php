@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">3D Room View</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            View your room design in 3D. Rotate and zoom to see your space from different angles.
        </p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <!-- 3D Viewer Container -->
        <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden relative" id="viewer3D" style="height: 600px;">
            <!-- Room Container -->
            <div id="roomContainer" class="absolute inset-0 perspective-1000">
                <!-- Room will be rendered here -->
                <div id="room3D" class="w-full h-full transform-style-preserve-3d transition-transform duration-500">
                    <!-- Floor -->
                    <div id="floor" class="absolute bottom-0 w-full h-full opacity-80"></div>
                    <!-- Walls -->
                    <div id="backWall" class="absolute back-wall w-full h-full opacity-90"></div>
                    <div id="leftWall" class="absolute left-wall h-full opacity-90"></div>
                    <div id="rightWall" class="absolute right-wall h-full opacity-90"></div>
                    <!-- Furniture will be added here -->
                    <div id="furnitureContainer" class="absolute inset-0"></div>
                </div>
            </div>
            <!-- Loading message -->
            <div id="loadingMessage" class="flex items-center justify-center h-full">
                <p class="text-gray-500">Loading your room design...</p>
            </div>
            <!-- No design message -->
            <div id="noDesignMessage" class="flex items-center justify-center h-full" style="display: none;">
                <div class="text-center">
                    <p class="text-gray-500 mb-4">No room design found</p>
                    <a href="{{ route('room-planner.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Create a Design
                    </a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="mt-6 flex justify-between items-center">
            <div class="space-x-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" id="rotateLeft">
                    <i class="fas fa-undo"></i> Rotate Left
                </button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" id="rotateRight">
                    Rotate Right <i class="fas fa-redo"></i>
                </button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" id="resetView">
                    <i class="fas fa-sync"></i> Reset View
                </button>
            </div>
            <a href="{{ route('room-planner.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left"></i> Back to Planner
            </a>
        </div>
    </div>
</div>

@push('styles')
<style>
.perspective-1000 {
    perspective: 1000px;
}
.transform-style-preserve-3d {
    transform-style: preserve-3d;
}
.back-wall {
    background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e0 100%);
    transform: translateZ(-300px);
}
.left-wall {
    background: linear-gradient(135deg, #f7fafc 0%, #e2e8f0 100%);
    width: 300px;
    transform: rotateY(90deg) translateZ(-150px);
}
.right-wall {
    background: linear-gradient(135deg, #f7fafc 0%, #e2e8f0 100%);
    width: 300px;
    right: 0;
    transform: rotateY(-90deg) translateZ(-150px);
}
#floor {
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    transform: rotateX(90deg) translateZ(-300px);
}
.furniture-item-3d {
    position: absolute;
    border: 2px solid #4f46e5;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.furniture-item-3d:hover {
    transform: translateZ(10px);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize 3D viewer
    const viewer = document.getElementById('viewer3D');
    const room3D = document.getElementById('room3D');
    const rotateLeftBtn = document.getElementById('rotateLeft');
    const rotateRightBtn = document.getElementById('rotateRight');
    const resetViewBtn = document.getElementById('resetView');
    const loadingMessage = document.getElementById('loadingMessage');
    const noDesignMessage = document.getElementById('noDesignMessage');
    const furnitureContainer = document.getElementById('furnitureContainer');
    const floor = document.getElementById('floor');
    const backWall = document.getElementById('backWall');
    const leftWall = document.getElementById('leftWall');
    const rightWall = document.getElementById('rightWall');

    // 3D rotation control
    let rotation = 0;
    let roomDesign = null;
    
    // Load saved room design
    function loadRoomDesign() {
        // First try to get from sessionStorage (from room planner)
        const savedDesign = sessionStorage.getItem('roomDesign');
        if (savedDesign) {
            try {
                roomDesign = JSON.parse(savedDesign);
                renderRoom();
                return;
            } catch (e) {
                console.error('Error parsing room design from sessionStorage:', e);
            }
        }

        // If no design in sessionStorage, try to fetch from backend
        const urlParams = new URLSearchParams(window.location.search);
        const designId = urlParams.get('design_id');
        
        if (designId) {
            fetch(`/room-planner/load/${designId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.design) {
                        roomDesign = data.design;
                        renderRoom();
                    } else {
                        showNoDesign();
                    }
                })
                .catch(error => {
                    console.error('Error loading room design:', error);
                    showNoDesign();
                });
        } else {
            showNoDesign();
        }
    }

    function renderRoom() {
        if (!roomDesign) {
            showNoDesign();
            return;
        }

        loadingMessage.style.display = 'none';
        noDesignMessage.style.display = 'none';
        
        // Set room dimensions
        const roomWidth = roomDesign.width || 400;
        const roomHeight = roomDesign.height || 300;
        
        // Update floor and walls based on room dimensions
        floor.style.width = roomWidth + 'px';
        floor.style.height = roomHeight + 'px';
        backWall.style.width = roomWidth + 'px';
        backWall.style.height = '400px';
        leftWall.style.width = roomHeight + 'px';
        leftWall.style.height = '400px';
        rightWall.style.width = roomHeight + 'px';
        rightWall.style.height = '400px';
        
        // Clear existing furniture
        furnitureContainer.innerHTML = '';
        
        // Render furniture items
        if (roomDesign.furniture && Array.isArray(roomDesign.furniture)) {
            roomDesign.furniture.forEach((item, index) => {
                const furnitureDiv = document.createElement('div');
                furnitureDiv.className = 'furniture-item-3d';
                furnitureDiv.style.left = (item.x || 0) + 'px';
                furnitureDiv.style.top = (item.y || 0) + 'px';
                furnitureDiv.style.width = (item.width || 80) + 'px';
                furnitureDiv.style.height = (item.height || 80) + 'px';
                
                // Set furniture color based on type
                const furnitureColors = {
                    'sofa': '#8b5cf6',
                    'chair': '#10b981',
                    'table': '#f59e0b',
                    'bed': '#ef4444',
                    'wardrobe': '#6366f1',
                    'desk': '#14b8a6',
                    'shelf': '#f97316'
                };
                
                const color = furnitureColors[item.type] || '#6b7280';
                furnitureDiv.style.backgroundColor = color;
                
                // Add furniture label
                furnitureDiv.innerHTML = `
                    <div style="text-align: center; line-height: 1.2;">
                        <div style="font-size: 10px; opacity: 0.9;">${item.name || item.type || 'Furniture'}</div>
                        <div style="font-size: 8px; opacity: 0.7;">${item.width || 80}×${item.height || 80}</div>
                    </div>
                `;
                
                // Add some 3D depth effect
                furnitureDiv.style.transform = `translateZ(${10 + (index * 2)}px)`;
                
                furnitureContainer.appendChild(furnitureDiv);
            });
        }
        
        // Show room info
        console.log('Room rendered:', {
            dimensions: `${roomWidth}×${roomHeight}`,
            furniture: roomDesign.furniture ? roomDesign.furniture.length : 0
        });
    }
    
    function showNoDesign() {
        loadingMessage.style.display = 'none';
        noDesignMessage.style.display = 'flex';
    }
    
    // Rotation controls
    rotateLeftBtn.addEventListener('click', function() {
        rotation -= 45;
        updateRotation();
    });

    rotateRightBtn.addEventListener('click', function() {
        rotation += 45;
        updateRotation();
    });

    resetViewBtn.addEventListener('click', function() {
        rotation = 0;
        updateRotation();
    });

    function updateRotation() {
        room3D.style.transform = `rotateY(${rotation}deg)`;
    }
    
    // Initialize
    loadRoomDesign();
});
</script>
@endpush
@endsection 