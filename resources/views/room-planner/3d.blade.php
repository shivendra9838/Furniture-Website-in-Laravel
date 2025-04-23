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
        <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden" id="viewer3D">
            <div class="flex items-center justify-center h-full">
                <p class="text-gray-500">3D viewer loading...</p>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize 3D viewer
    const viewer = document.getElementById('viewer3D');
    const rotateLeftBtn = document.getElementById('rotateLeft');
    const rotateRightBtn = document.getElementById('rotateRight');
    const resetViewBtn = document.getElementById('resetView');

    // Simulate 3D rotation (in a real implementation, you would use a 3D library like Three.js)
    let rotation = 0;
    
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
        viewer.style.transform = `rotateY(${rotation}deg)`;
    }
});
</script>
@endpush
@endsection 