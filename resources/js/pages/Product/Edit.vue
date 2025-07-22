<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, } from '@/components/ui/card';
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from "@/components/ui/textarea";
import { Button } from '@/components/ui/button';
import InputError from '@/components/InputError.vue';

import { type BreadcrumbItem, type Product, type Paginated, Category } from '@/types';
import { Head, useForm, Link } from '@inertiajs/vue3'
import { Select, SelectTrigger, SelectValue, SelectContent, SelectItem } from '@/components/ui/select';

const props = defineProps<{
    categories: Category[];
    product: Product
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Products',
        href: '/products',
    },
    {
        title: 'Edit Products',
        href: route('products.edit', props.product.id),
    },
];

const form = useForm({
    product_name: props.product.product_name,
    product_description: props.product.product_description,
    category_id: props.product.category_id,
    quantity: props.product.quantity,
    price: props.product.price,
});

const submit = () => {
    form.put(route('products.update', props.product.id));
}

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Edit Products" />
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <Card class="w-1/2 mt-5 mx-auto">
                <CardHeader>
                    <CardTitle class="text-center">Edit Product</CardTitle>
                </CardHeader>
                <form @submit.prevent="submit">
                    <CardContent>
                        <div class="grid items-center w-full gap-4">
                            <div class="flex flex-col space-y-1.5">
                                <Label for="product_name">
                                    Product Name
                                    <span class="text-red-500">*</span>
                                </Label>
                                <Input id="product_name" placeholder="e.g. T-shirt" v-model="form.product_name"/>
                                <InputError :message="form.errors.product_name" />
                            </div>
                            <div class="flex flex-col space-y-1.5">
                                <Label for="category">Choose Category<span class="text-red-500">*</span></Label>
                                <Select id="category" v-model="form.category_id">
                                    <SelectTrigger id="category">
                                        <SelectValue placeholder="Choose a category" />
                                    </SelectTrigger>
                                    <SelectContent position="popper">
                                        <SelectItem v-for="category in categories" :key="category.id"  :value="category.id">
                                            {{ category.name }}
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError :message="form.errors.category_id" />
                            </div>
                            <div class="flex flex-col space-y-1.5">
                                <Label for="product_description">Product Description</Label>
                                <Textarea id="product_description" placeholder="Enter product description..."
                                    v-model="form.product_description"/>
                                <InputError :message="form.errors.product_description" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col space-y-1.5">
                                    <Label for="quantity">Product Quantity<span class="text-red-500">*</span></Label>
                                    <Input id="quantity" placeholder="e.g. 10" v-model="form.quantity"/>
                                    <InputError :message="form.errors.quantity" />
                                </div>
                                <div class="flex flex-col space-y-1.5">
                                    <Label for="price">Product Price<span class="text-red-500">*</span></Label>
                                    <Input id="price" placeholder="e.g. 500.00" v-model="form.price"/>
                                    <InputError :message="form.errors.price" />
                                </div>
                            </div>
                            <Button :disabled="form.processing" type="submit"
                                class="w-full cursor-pointer">Save</Button>
                        </div>
                    </CardContent>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>
<style scoped>
#category{
    width: 100% !important;
}
</style>
