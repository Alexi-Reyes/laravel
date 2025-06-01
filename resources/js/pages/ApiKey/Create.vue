<template>
  <AppLayout title="Create API Key">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create API Key
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form @submit.prevent="submit">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">API Key Name</label>
                <input
                  type="text"
                  id="name"
                  v-model="form.name"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  required
                />
                <InputError :message="form.errors.name" class="mt-2" />
              </div>

              <div class="flex items-center justify-end mt-4">
                <button
                  type="submit"
                  :class="{ 'opacity-25': form.processing }"
                  class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                >
                  Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import InputError from '@/components/InputError.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
});

const submit = () => {
  form.post(route('apiKeys.store'));
};
</script>
