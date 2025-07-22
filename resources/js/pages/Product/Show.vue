<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, } from '@/components/ui/card';

import { type BreadcrumbItem, type Product, type Paginated, Category } from '@/types';
import { Head, Link } from '@inertiajs/vue3'


const props = defineProps<{
    product: Product
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Products',
        href: '/products',
    },
    {
        title: 'Show Product',
        href: route('products.show', props.product.id),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Create Products" />
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <Card class="w-1/2 mt-5 mx-auto">
                <CardHeader>
                    <CardTitle class="text-center">Product Details</CardTitle>
                </CardHeader>
                <CardContent>
                    <div class="flex gap-2">
                        <p class="text-sm font-medium leading-none text-muted-foreground">Product Name:</p>
                        <p class="text-sm font-medium leading-none text-muted-foreground">{{ props.product.product_name }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="text-sm font-medium leading-none text-muted-foreground">Product Description:</p>
                        <p class="text-sm font-medium leading-none text-muted-foreground">{{ props.product.product_description }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="text-sm font-medium leading-none text-muted-foreground">Product Price:</p>
                        <p class="text-sm font-medium leading-none text-muted-foreground">{{ props.product.price }}</p>
                    </div>
                    <div class="flex gap-2">
                        <p class="text-sm font-medium leading-none text-muted-foreground">Product Category:</p>
                        <p class="text-sm font-medium leading-none text-muted-foreground">{{ props.product.category?.name || 'N/A' }}</p>
                    </div>
                </CardContent>
            </Card>
        </div>
    </AppLayout>
</template>
<style scoped>
#category{
    width: 100% !important;
}
</style>
