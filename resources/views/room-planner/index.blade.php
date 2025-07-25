@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">Room Planner</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Design your perfect room layout with our interactive 3D room planner. Customize dimensions, colors, and furniture placement to visualize your dream space.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Room Canvas -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Room Settings -->
                <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Room Dimensions -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Room Dimensions (ft)</label>
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <input type="number" id="roomLength" value="12" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <label class="text-xs text-gray-500">Length</label>
                            </div>
                            <div>
                                <input type="number" id="roomWidth" value="10" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <label class="text-xs text-gray-500">Width</label>
                            </div>
                            <div>
                                <input type="number" id="roomHeight" value="8" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <label class="text-xs text-gray-500">Height</label>
                            </div>
                        </div>
                    </div>

                    <!-- Wall Color -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Wall Color</label>
                        <div class="flex space-x-2">
                            <button class="w-8 h-8 rounded-full bg-white border-2 border-gray-300" data-color="white"></button>
                            <button class="w-8 h-8 rounded-full bg-gray-100" data-color="gray-100"></button>
                            <button class="w-8 h-8 rounded-full bg-blue-100" data-color="blue-100"></button>
                            <button class="w-8 h-8 rounded-full bg-green-100" data-color="green-100"></button>
                            <button class="w-8 h-8 rounded-full bg-yellow-100" data-color="yellow-100"></button>
                        </div>
                    </div>

                    <!-- Floor Type -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Floor Type</label>
                        <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" id="floorType">
                            <option value="hardwood">Hardwood</option>
                            <option value="tile">Tile</option>
                            <option value="carpet">Carpet</option>
                            <option value="laminate">Laminate</option>
                        </select>
                    </div>
                </div>

                <!-- Room Canvas -->
                <div class="relative aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden" id="roomCanvas">
                    <!-- Grid Lines -->
                    <div class="absolute inset-0 grid grid-cols-12 grid-rows-12 gap-1 opacity-20">
                        @for($i = 0; $i < 12; $i++)
                            @for($j = 0; $j < 12; $j++)
                                <div class="border border-gray-300"></div>
                            @endfor
                        @endfor
                    </div>
                    
                    <!-- Furniture Items (will be added dynamically) -->
                    <div id="furnitureContainer" class="absolute inset-0"></div>

                    <!-- Room Measurements -->
                    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                        <div class="absolute top-0 left-0 w-full h-8 flex items-center justify-center">
                            <span class="bg-white px-2 py-1 rounded text-sm" id="lengthDisplay">12 ft</span>
                        </div>
                        <div class="absolute top-0 left-0 h-full w-8 flex items-center justify-center">
                            <span class="bg-white px-2 py-1 rounded text-sm transform -rotate-90" id="widthDisplay">10 ft</span>
                        </div>
                    </div>
                </div>

                <!-- Room Summary -->
                <div class="mt-6 bg-gray-50 rounded-lg p-4">
                    <h3 class="font-semibold mb-2">Room Summary</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Total Area</p>
                            <p class="font-medium" id="totalArea">120 sq ft</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Wall Color</p>
                            <p class="font-medium" id="wallColorDisplay">White</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Floor Type</p>
                            <p class="font-medium" id="floorTypeDisplay">Hardwood</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Furniture Items</p>
                            <p class="font-medium" id="furnitureCount">0</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-between">
                    <div class="space-x-4">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" id="saveDesign">
                            <i class="fas fa-save mr-2"></i>Save Design
                        </button>
                        <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700" id="view3D">
                            <i class="fas fa-cube mr-2"></i>View 3D
                        </button>
                    </div>
                    <button class="text-gray-600 hover:text-gray-800" id="resetDesign">
                        <i class="fas fa-undo mr-2"></i>Reset Design
                    </button>
                </div>
            </div>
        </div>

        <!-- Furniture Library -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Furniture Library</h2>
            
            <!-- Categories -->
            <div class="mb-4">
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" id="furnitureCategory">
                    <option value="all">All Categories</option>
                    <option value="living">Living Room</option>
                    <option value="bedroom">Bedroom</option>
                    <option value="dining">Dining Room</option>
                    <option value="office">Office</option>
                </select>
            </div>

            <!-- Search -->
            <div class="mb-4">
                <input type="text" placeholder="Search furniture..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" id="furnitureSearch">
            </div>

            <!-- Furniture Items -->
            <div class="space-y-4 max-h-[600px] overflow-y-auto" id="furnitureItems">
                <!-- Sample furniture items -->
                <div class="border rounded-lg p-4 cursor-pointer hover:bg-gray-50 furniture-item" draggable="true" data-type="sofa" data-category="living">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-200 rounded mr-4"></div>
                        <div>
                            <p class="font-medium">Modern Sofa</p>
                            <p class="text-sm text-gray-500">72" x 36" x 32"</p>
                            <p class="text-sm text-blue-600">Living Room</p>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg p-4 cursor-pointer hover:bg-gray-50 furniture-item" draggable="true" data-type="table" data-category="living">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-200 rounded mr-4"></div>
                        <div>
                            <p class="font-medium">Coffee Table</p>
                            <p class="text-sm text-gray-500">48" x 24" x 18"</p>
                            <p class="text-sm text-blue-600">Living Room</p>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg p-4 cursor-pointer hover:bg-gray-50 furniture-item" draggable="true" data-type="chair" data-category="living">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-200 rounded mr-4"></div>
                        <div>
                            <p class="font-medium">Accent Chair</p>
                            <p class="text-sm text-gray-500">24" x 24" x 32"</p>
                            <p class="text-sm text-blue-600">Living Room</p>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg p-4 cursor-pointer hover:bg-gray-50 furniture-item" draggable="true" data-type="bed" data-category="bedroom">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-200 rounded mr-4"></div>
                        <div>
                            <p class="font-medium">Queen Bed</p>
                            <p class="text-sm text-gray-500">60" x 80" x 16"</p>
                            <p class="text-sm text-blue-600">Bedroom</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const roomCanvas = document.getElementById('roomCanvas');
    const furnitureContainer = document.getElementById('furnitureContainer');
    const furnitureItems = document.querySelectorAll('.furniture-item');
    const saveDesignBtn = document.getElementById('saveDesign');
    const view3DBtn = document.getElementById('view3D');
    const resetDesignBtn = document.getElementById('resetDesign');
    const wallColorBtns = document.querySelectorAll('[data-color]');
    const floorTypeSelect = document.getElementById('floorType');
    const furnitureCategorySelect = document.getElementById('furnitureCategory');
    const furnitureSearch = document.getElementById('furnitureSearch');
    const lengthDisplay = document.getElementById('lengthDisplay');
    const widthDisplay = document.getElementById('widthDisplay');
    const totalAreaDisplay = document.getElementById('totalArea');
    const wallColorDisplay = document.getElementById('wallColorDisplay');
    const floorTypeDisplay = document.getElementById('floorTypeDisplay');
    const furnitureCountDisplay = document.getElementById('furnitureCount');

    // Update room measurements
    function updateRoomMeasurements() {
        const length = document.getElementById('roomLength').value;
        const width = document.getElementById('roomWidth').value;
        lengthDisplay.textContent = `${length} ft`;
        widthDisplay.textContent = `${width} ft`;
        totalAreaDisplay.textContent = `${length * width} sq ft`;
    }

    // Update wall color display
    function updateWallColorDisplay(color) {
        wallColorDisplay.textContent = color.charAt(0).toUpperCase() + color.slice(1).replace('-', ' ');
    }

    // Update floor type display
    function updateFloorTypeDisplay(type) {
        floorTypeDisplay.textContent = type.charAt(0).toUpperCase() + type.slice(1);
    }

    // Update furniture count
    function updateFurnitureCount() {
        furnitureCountDisplay.textContent = furnitureContainer.children.length;
    }

    // Filter furniture items
    function filterFurniture() {
        const category = furnitureCategorySelect.value;
        const search = furnitureSearch.value.toLowerCase();
        
        furnitureItems.forEach(item => {
            const itemCategory = item.dataset.category;
            const itemName = item.querySelector('.font-medium').textContent.toLowerCase();
            
            const categoryMatch = category === 'all' || itemCategory === category;
            const searchMatch = itemName.includes(search);
            
            item.style.display = categoryMatch && searchMatch ? 'block' : 'none';
        });
    }

    // Drag and drop functionality for furniture items from library
    furnitureItems.forEach(item => {
        item.addEventListener('dragstart', function(e) {
            e.dataTransfer.setData('text/plain', this.dataset.type);
            this.classList.add('opacity-50');
        });

        item.addEventListener('dragend', function() {
            this.classList.remove('opacity-50');
        });
    });

    // Allow room canvas to accept drops
    roomCanvas.addEventListener('dragover', function(e) {
        e.preventDefault();
    });

    // Handle dropping furniture onto canvas
    roomCanvas.addEventListener('drop', function(e) {
        e.preventDefault();
        const furnitureType = e.dataTransfer.getData('text/plain');
        
        // Only create new furniture if it's not a move operation
        if (furnitureType !== 'move') {
            const rect = roomCanvas.getBoundingClientRect();
            const x = e.clientX - rect.left - 32; // Center the item
            const y = e.clientY - rect.top - 32;

            // Create new furniture item on canvas
            const newFurniture = document.createElement('div');
            newFurniture.className = 'absolute w-16 h-16 bg-blue-300 border-2 border-blue-500 rounded cursor-move flex items-center justify-center text-xs font-bold text-blue-800';
            newFurniture.style.left = Math.max(0, Math.min(x, roomCanvas.offsetWidth - 64)) + 'px';
            newFurniture.style.top = Math.max(0, Math.min(y, roomCanvas.offsetHeight - 64)) + 'px';
            newFurniture.draggable = true;
            newFurniture.dataset.type = furnitureType;
            newFurniture.textContent = furnitureType.charAt(0).toUpperCase();
            newFurniture.title = furnitureType;

            // Add double-click to remove
            newFurniture.addEventListener('dblclick', function() {
                if (confirm('Remove this furniture item?')) {
                    this.remove();
                    updateFurnitureCount();
                }
            });

            // Add drag functionality to placed furniture for repositioning
            newFurniture.addEventListener('dragstart', function(e) {
                e.dataTransfer.setData('text/plain', 'move');
                this.classList.add('opacity-50');
                this.style.zIndex = '1000';
                // Store original position for potential cancellation
                this.dataset.originalX = this.style.left;
                this.dataset.originalY = this.style.top;
            });

            newFurniture.addEventListener('dragend', function() {
                this.classList.remove('opacity-50');
                this.style.zIndex = 'auto';
            });

            furnitureContainer.appendChild(newFurniture);
            updateFurnitureCount();
        }
    });

    // Handle repositioning of existing furniture
    furnitureContainer.addEventListener('dragover', function(e) {
        e.preventDefault();
    });

    furnitureContainer.addEventListener('drop', function(e) {
        e.preventDefault();
        const moveType = e.dataTransfer.getData('text/plain');
        
        if (moveType === 'move') {
            const draggedElement = document.querySelector('.opacity-50');
            if (draggedElement) {
                const rect = roomCanvas.getBoundingClientRect();
                const x = e.clientX - rect.left - 32;
                const y = e.clientY - rect.top - 32;
                
                draggedElement.style.left = Math.max(0, Math.min(x, roomCanvas.offsetWidth - 64)) + 'px';
                draggedElement.style.top = Math.max(0, Math.min(y, roomCanvas.offsetHeight - 64)) + 'px';
            }
        }
    });

    // Wall color selection
    wallColorBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const color = this.dataset.color;
            // Remove active state from all buttons
            wallColorBtns.forEach(b => b.classList.remove('ring-2', 'ring-offset-2', 'ring-blue-500'));
            // Add active state to clicked button
            this.classList.add('ring-2', 'ring-offset-2', 'ring-blue-500');
            
            // Apply color to room canvas
            roomCanvas.className = roomCanvas.className.replace(/bg-\w+-\d+/, '') + ` bg-${color}`;
            updateWallColorDisplay(color);
        });
    });

    // Save design
    saveDesignBtn.addEventListener('click', function() {
        // Collect all furniture positions and room settings
        const design = {
            dimensions: {
                length: document.getElementById('roomLength').value,
                width: document.getElementById('roomWidth').value,
                height: document.getElementById('roomHeight').value
            },
            wallColor: roomCanvas.className.match(/bg-[\w-]+/) ? roomCanvas.className.match(/bg-[\w-]+/)[0] : 'bg-gray-100',
            floorType: floorTypeSelect.value,
            furniture: Array.from(furnitureContainer.children).map(item => ({
                type: item.dataset.type,
                x: item.style.left,
                y: item.style.top
            }))
        };

        // Send to server
        fetch('/room-planner/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(design)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Design saved successfully!');
            } else {
                alert('Error saving design. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving design. Please try again.');
        });
    });

    // View 3D
    view3DBtn.addEventListener('click', function() {
        // Pass current design data to 3D view
        const design = {
            dimensions: {
                length: document.getElementById('roomLength').value,
                width: document.getElementById('roomWidth').value,
                height: document.getElementById('roomHeight').value
            },
            wallColor: roomCanvas.className.match(/bg-[\w-]+/) ? roomCanvas.className.match(/bg-[\w-]+/)[0] : 'bg-gray-100',
            floorType: floorTypeSelect.value,
            furniture: Array.from(furnitureContainer.children).map(item => ({
                type: item.dataset.type,
                x: item.style.left,
                y: item.style.top
            }))
        };
        
        // Store design in session storage for 3D view
        sessionStorage.setItem('roomDesign', JSON.stringify(design));
        window.location.href = '/room-planner/3d';
    });

    // Reset design
    resetDesignBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to reset the design?')) {
            furnitureContainer.innerHTML = '';
            document.getElementById('roomLength').value = '12';
            document.getElementById('roomWidth').value = '10';
            document.getElementById('roomHeight').value = '8';
            roomCanvas.className = roomCanvas.className.replace(/bg-\w+-\d+/, '') + ' bg-gray-100';
            floorTypeSelect.value = 'hardwood';
            
            // Reset wall color button selection
            wallColorBtns.forEach(b => b.classList.remove('ring-2', 'ring-offset-2', 'ring-blue-500'));
            wallColorBtns[0].classList.add('ring-2', 'ring-offset-2', 'ring-blue-500');
            
            updateRoomMeasurements();
            updateWallColorDisplay('gray-100');
            updateFloorTypeDisplay('hardwood');
            updateFurnitureCount();
        }
    });

    // Initialize measurements and displays
    updateRoomMeasurements();
    updateWallColorDisplay('gray');
    updateFloorTypeDisplay(floorTypeSelect.value);
    updateFurnitureCount();
    
    // Set initial wall color button as active
    wallColorBtns[0].classList.add('ring-2', 'ring-offset-2', 'ring-blue-500');

    // Event listeners for room dimensions
    document.getElementById('roomLength').addEventListener('change', updateRoomMeasurements);
    document.getElementById('roomWidth').addEventListener('change', updateRoomMeasurements);

    // Event listeners for furniture filtering
    furnitureCategorySelect.addEventListener('change', filterFurniture);
    furnitureSearch.addEventListener('input', filterFurniture);

    // Floor type change
    floorTypeSelect.addEventListener('change', function() {
        updateFloorTypeDisplay(this.value);
    });
});
</script>
@endpush
@endsection 