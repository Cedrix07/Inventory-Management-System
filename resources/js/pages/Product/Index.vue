<script setup lang="ts">
import ProductTable from '@/components/Product/ProductTable.vue';
import { buttonVariants } from '@/components/ui/button';
import { Input } from '@/components/ui/input'
import { Search } from 'lucide-vue-next';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type Product, type Paginated } from '@/types';
import { Head, Link } from '@inertiajs/vue3'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Products',
        href: '/products',
    },
];

const props = defineProps<{
  products: Paginated<Product>;
}>();
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Manage Products" />
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="flex items-center justify-between">
                <div class="relative w-full max-w-sm items-center">
                    <Input id="search" type="text" placeholder="Search..." class="pl-10" />
                    <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
                    <Search class="size-6 text-muted-foreground" />
                    </span>
                </div>
               <Link :href="route('products.create')" :class="buttonVariants({ variant: 'outline' })" class="d-inline-block ms-auto">Add Product</Link>
            </div>
            <div>
              <ProductTable :products="props.products.data" :paginate="props.products"/>
            </div>
        </div>
    </AppLayout>
</template>
