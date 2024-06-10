<template>
  <Head title="Blogs" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blogs</h2>
        <a
          :href="route('blogs.add')"
          type="button"
          class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Create New Blog
        </a>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <ul role="list" class="divide-y divide-gray-100">
            <li
              v-for="blog in props.blogs.data"
              v-bind:key="blog.id"
              class="flex justify-between gap-x-6 py-5"
            >
              <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                  <p class="text-sm font-semibold leading-6 text-gray-900">
                    {{ blog.title }}
                  </p>
                  <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                    {{ blog.body.substring(0, 15) + "..." }}
                  </p>
                </div>
              </div>
              <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900">
                  Author: {{ blog.user.name }}
                </p>
                <p class="mt-1 text-xs leading-5 text-gray-500">
                  Created At:
                  {{ moment(blog.created_at).format("DD-MM-YYYY hh:mm A") }}
                </p>
                <div class="flex">
                  <a
                    :href="route('blogs.edit')"
                    class="flex justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 mr-2"
                    >Edit</a
                  >
                  <a
                    :href="route('blogs.delete')"
                    class="flex justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                    >Delete</a
                  >
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";
import moment from "moment";
const props = defineProps({
  blogs: {
    type: Array,
  },
});

onMounted: {
  console.log(props.blogs.data);
}
</script>

<style>
</style>
