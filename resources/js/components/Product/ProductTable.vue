<script setup lang="ts">
import {Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table'
import Pagination from '@/components/Product/Pagination.vue';
import type { Paginated, Product } from '@/types/';
import { Link, router } from '@inertiajs/vue3';

defineProps<{
  products: Product[];
  paginate: Paginated<Product>;
}>();

const confirmDelete = (id: number) => {
    if(confirm('Are you sure you want to delete this product?')) {
        router.delete(route('products.destroy', id))
    }else{
        return
    }
}
</script>

<template>
  <Table class="mb-4">
    <TableHeader>
      <TableRow>
        <TableHead>Name</TableHead>
        <TableHead>Description</TableHead>
        <TableHead>Quantity</TableHead>
        <TableHead>Price</TableHead>
        <TableHead>Category</TableHead>
        <TableHead class="text-right"></TableHead>
      </TableRow>
    </TableHeader>
    <TableBody>
      <TableRow v-for="product in products" :key="product.id">
        <TableCell>{{ product.product_name }}</TableCell>
        <TableCell>{{ product.product_description }}</TableCell>
        <TableCell>{{ product.quantity }}</TableCell>
        <TableCell>{{ product.price }}</TableCell>
        <TableCell>{{ product.category?.name || 'N/A' }}</TableCell>
        <TableCell class="flex gap-2 justify-end me-3">
            <Link :href="route('products.show', product.id)" class="hover:underline">Show</Link>
            <Link :href="route('products.edit', product.id)" class="hover:underline">Edit</Link>
            <button
                class="hover:underline cursor-pointer"
                @click="confirmDelete(product.id)"
                >
                Delete
            </button>
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
  <Pagination :paginate="paginate"/>
</template>
