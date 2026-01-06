<div>
    <div class="p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-lg font-semibold mb-4">Customer Support</h3>
    <div class="flex space-x-6">
        <!-- WhatsApp Link -->
        <a href="https://wa.me/{{ $whatsappNumber }}"  
        {{ $whatsappNumber }}?text=Hello,%20I%20need%20assistance%20with%20my%20account." 
           target="_blank" 
           class="flex flex-col items-center hover:opacity-80 transition">
            <svg class="w-12 h-12 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.29-4.143c1.589.943 3.131 1.468 4.76 1.469 5.405 0 9.813-4.41 9.815-9.814.001-2.618-1.02-5.08-2.876-6.937-1.856-1.856-4.318-2.876-6.936-2.877-5.41 0-9.813 4.414-9.815 9.815-.001 1.838.482 3.533 1.426 5.158l-.94 3.433 3.566-.907z"/>
            </svg>
            <span class="mt-2 text-sm font-medium">WhatsApp</span>
        </a>

        <!-- Telegram Link -->
        <a href="https://t.me/{{ $telegramUsername }}" 
           target="_blank" 
           class="flex flex-col items-center hover:opacity-80 transition">
            <svg class="w-12 h-12 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zM17.8 8.1l-2.3 10.8c-.1.8-.7.9-1.2.6l-3.5-2.6-1.7 1.6c-.2.2-.4.4-.8.4l.2-3.4 6.2-5.6c.3-.2-.1-.4-.4-.2L7.3 14.5l-3.3-1.1c-.7-.2-.7-.7.1-1.1l13-5c.6-.2 1.1.1.7.8z"/>
            </svg>
            <span class="mt-2 text-sm font-medium">Telegram</span>
        </a>
    </div>
</div>

</div>
