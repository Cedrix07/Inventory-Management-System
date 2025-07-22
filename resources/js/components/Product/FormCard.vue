<script setup lang="ts">
import { Card, CardContent, CardHeader, CardTitle, } from '@/components/ui/card';
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from "@/components/ui/textarea";
import { Button } from '@/components/ui/button';
import { useForm } from '@inertiajs/vue3';
import InputError from '../InputError.vue';

const form = useForm({
    product_name: '',
    product_description: '',
    quantity:'' ,
    price: '',
});

const submit = () => {
    form.post(route('products.store'));
}
</script>

<template>
    <Card class="w-1/2">
        <CardHeader>
            <CardTitle>Create Product</CardTitle>
        </CardHeader>
        <form @submit.prevent="submit">
            <CardContent>
                <div class="grid items-center w-full gap-4">
                    <div class="flex flex-col space-y-1.5">
                        <Label for="product_name">
                            Product Name
                        </Label>
                        <Input id="product_name" placeholder="e.g. T-shirt" v-model="form.product_name" />
                        <InputError :message="form.errors.product_name" />
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <Label for="product_description">Product Description</Label>
                        <Textarea id="product_description" placeholder="Enter product description..."
                            v-model="form.product_description" />
                        <InputError :message="form.errors.product_description" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col space-y-1.5">
                            <Label for="quantity">Product Quantity</Label>
                            <Input id="quantity" placeholder="e.g. 10" v-model="form.quantity" />
                            <InputError :message="form.errors.quantity" />
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <Label for="price">Product Price</Label>
                            <Input id="price" placeholder="e.g. 500.00" v-model="form.price" />
                            <InputError :message="form.errors.price" />
                        </div>
                    </div>
                     <Button :disabled="form.processing" type="submit" class="w-full cursor-pointer">Create</Button>
                </div>
            </CardContent>
        </form>
    </Card>
</template>
