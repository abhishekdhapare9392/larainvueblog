
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";

const form = useForm({
  title: "",
  body: "",
  meta_title: "",
  meta_description: "",
});

const saveBlog = () => {
  console.log("Coming here...");
  form.post(route("blogs.store"));
};
</script>

<template>
  <Head title="Blogs" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Create New Blog
        </h2>
        <a
          :href="route('blogs.list')"
          class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Back
        </a>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <form @submit.prevent="saveBlog">
            <div class="space-y-12">
              <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1">
                  <div class="sm:col-span-4">
                    <label
                      for="title"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Title</label
                    >
                    <div class="mt-2">
                      <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600"
                      >
                        <input
                          type="text"
                          name="title"
                          id="title"
                          v-model="form.title"
                          autocomplete="title"
                          class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                          placeholder="Enter the blog title"
                        />
                      </div>
                      <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                  </div>
                </div>

                <div class="mt-10 grid grid-cols-1">
                  <div class="sm:col-span-4">
                    <label
                      for="body"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Body</label
                    >
                    <div class="mt-2">
                      <textarea
                        id="body"
                        name="body"
                        rows="3"
                        v-model="form.body"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Enter the blog body"
                      ></textarea>
                      <InputError class="mt-2" :message="form.errors.body" />
                    </div>
                  </div>
                </div>

                <div class="mt-10 grid grid-cols-1">
                  <div class="sm:col-span-4">
                    <label
                      for="meta_title"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Meta Title</label
                    >
                    <div class="mt-2">
                      <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600"
                      >
                        <input
                          type="text"
                          name="meta_title"
                          id="meta_title"
                          v-model="form.meta_title"
                          autocomplete="meta_title"
                          class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                          placeholder="Enter the blog meta title"
                        />
                      </div>
                      <InputError
                        class="mt-2"
                        :message="form.errors.meta_title"
                      />
                    </div>
                  </div>
                </div>

                <div class="mt-10 grid grid-cols-1">
                  <div class="sm:col-span-4">
                    <label
                      for="meta_description"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Meta Description</label
                    >
                    <div class="mt-2">
                      <textarea
                        id="meta_description"
                        name="meta_description"
                        rows="3"
                        v-model="form.meta_description"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Enter the meta description"
                      ></textarea>
                      <InputError
                        class="mt-2"
                        :message="form.errors.meta_description"
                      />
                    </div>
                  </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                  <button
                    type="button"
                    class="text-sm font-semibold leading-6 text-gray-900"
                  >
                    Cancel
                  </button>
                  <button
                    type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                  >
                    Save
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>


<style>
</style>
