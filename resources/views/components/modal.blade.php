@props([
    'name',
    'show' => false,
    'maxWidth' => 'lg'
])

<div 
    id="modal-{{ $name }}"
    class="modal fade"
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="modal-{{ $name }}-title"
    aria-hidden="true"
    x-data="{ show: @js($show) }"
    x-show="show"
    @open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    @close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    style="display: @if($show) block @else none @endif"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>

<!-- Backdrop -->
<div 
    class="modal-backdrop fade"
    x-show="show"
    style="display: @if($show) block @else none @endif"
    @click="show = false"
></div>

<script>
    // Handle modal show/hide with Bootstrap
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('modal-{{ $name }}');
        const backdrop = modal?.nextElementSibling;
        
        window.addEventListener('open-modal', function(e) {
            if(e.detail === '{{ $name }}') {
                modal?.classList.add('show', 'd-block');
                backdrop?.classList.add('show', 'd-block');
                document.body.classList.add('modal-open');
            }
        });
        
        window.addEventListener('close-modal', function(e) {
            if(e.detail === '{{ $name }}') {
                modal?.classList.remove('show', 'd-block');
                backdrop?.classList.remove('show', 'd-block');
                document.body.classList.remove('modal-open');
            }
        });
    });
</script>
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
    </div>

    <div
        x-show="show"
        class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
    </div>
</div>
