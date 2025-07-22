import { ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';
import type { ToastType } from 'vue3-toastify';

interface FlashMessage {
    message: string;
    type?: ToastType;
}

export function useToast() {
    const toasts = ref<FlashMessage[]>([]);

    // Watch for changes in the session flash messages
    watch(
        () => usePage().props.success,
        (newMessage: string | null) => {
            if (newMessage) {
                toasts.value.push({
                    message: newMessage,
                    type: 'success', // Default to success; adjust if you add other types
                });
                fireToasts();
            }
        },
        { immediate: true } // Run immediately to catch initial messages
    );

    function fireToasts() {
        toasts.value.forEach((notification) => {
            toast(notification.message, {
                type: notification.type || 'success',
                position: toast.POSITION.TOP_RIGHT,
                autoClose: notification.type === 'success' ? 5000 : false, // Auto-close success toasts
                closeOnClick: true,
            });
        });
        toasts.value = []; // Clear toasts after displaying
    }

    return { toasts, fireToasts };
}
