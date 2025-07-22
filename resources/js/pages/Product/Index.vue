<script setup lang="ts">
import ProductTable from '@/components/Product/ProductTable.vue';
import { buttonVariants } from '@/components/ui/button';
import { Input } from '@/components/ui/input'
import { Search } from 'lucide-vue-next';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type Product, type Paginated, Category } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/vue3'
import { Select, SelectTrigger, SelectValue, SelectContent, SelectItem } from '@/components/ui/select';
import { watch } from 'vue';
import { debounce } from 'lodash'; // Import debounce from lodash

interface SearchForm {
  search: string;
  category_id: number | null;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Products',
        href: '/products',
    },
];

const props = defineProps<{
  products: Paginated<Product>;
  categories: Category[]
}>();

const form = useForm({
    search: '',
    category_id: 0
});

// Unified search and filter function
const applyFilters = () => {
  router.get(
    route('products.index'),
    {
      search: form.search,
      category_id: form.category_id || undefined,
    },
    {
      preserveState: true,
      preserveScroll: true,
      replace: true,
    }
  );
};

// Watch both search and category_id with debounce
watch(
  () => [form.search, form.category_id],
  debounce(() => {
    applyFilters();
  }, 300),
  { deep: true }
);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Manage Products" />
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex items-center gap-2">
                    <div class="relative w-full max-w-sm items-center">
                        <Input id="search" type="text" placeholder="Search..." class="pl-10" v-model="form.search" autocomplete="off"/>
                        <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
                        <Search class="size-6 text-muted-foreground" />
                        </span>
                    </div>
                    <Select id="category" v-model="form.category_id" @update:modelValue="applyFilters">
                        <SelectTrigger id="category">
                            <SelectValue placeholder="Filter by category" />
                        </SelectTrigger>
                        <SelectContent position="popper">
                            <SelectItem v-for="category in categories" :key="category.id"  :value="category.id">
                                {{ category.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                </div>
               <Link :href="route('products.create')" :class="buttonVariants({ variant: 'outline' })" class="d-inline-block ms-auto">Add Product</Link>
            </div>
            <div>
              <ProductTable :products="props.products.data" :paginate="props.products"/>
            </div>
        </div>
    </AppLayout>
</template>
