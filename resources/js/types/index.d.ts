import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Paginated<T> {
  current_page: number;
  data: T[];
  from: number;
  last_page: number;
  per_page: number;
  to: number;
  total: number;
  next_page_url: string | null;
  prev_page_url: string | null;
}

export interface Category {
    id: number;
    name: string;
    category_description?: string;
    created_at?: string;
    updated_at?: string;
}

export interface Product {
    id: number;
    product_name: string;
    product_description: string;
    quantity: number;
    price: number;
    status: string;
    category_id: number;
    category: Category | null;
    created_at: string;
    updated_at: string;
}


export type BreadcrumbItemType = BreadcrumbItem;
