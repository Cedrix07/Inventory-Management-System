<script setup lang="ts">
import {
  Pagination,
  PaginationContent,
  PaginationEllipsis,
  PaginationItem,
  PaginationNext,
  PaginationPrevious,
} from '@/components/ui/pagination'
import type { Paginated, Product } from '@/types'
import {router} from "@inertiajs/vue3";

const props = defineProps<{
  paginate: Paginated<Product>;
}>();

function goToPage(page: number) {
  const url = new URL(window.location.href);
  url.searchParams.set('page', page.toString());

  router.visit(url.toString(), {
    preserveScroll: true,
    preserveState: true,
  });
}

</script>

<template>
  <Pagination
    v-slot="{ page }"
    :items-per-page="props.paginate.per_page"
    :total="props.paginate.total"
    :default-page="props.paginate.current_page">
    <PaginationContent v-slot="{ items }">
      <PaginationPrevious @click="goToPage(page - 1)"/>
      <template v-for="(item, index) in Array.from({ length: paginate.last_page }, (_, i) => i + 1)" :key="index">
        <PaginationItem
          :value="item"
          :is-active="item === page"
           @click="goToPage(item)"
        >
          {{ item }}
        </PaginationItem>
      </template>

      <PaginationNext @click="goToPage(page + 1)"/>
    </PaginationContent>
  </Pagination>
</template>
