<template>
  <AppLayout title="API Keys">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        API Keys
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <InertiaLink :href="route('apiKeys.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Create New API Key
            </InertiaLink>

            <div v-if="apiKeys.length > 0" class="mt-4">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="apiKey in apiKeys" :key="apiKey.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ apiKey.name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ apiKey.key }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <button @click="confirmDelete(apiKey)" class="text-red-600 hover:text-red-900">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div v-else class="mt-4">
              <p>No API keys found.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link as InertiaLink, router } from '@inertiajs/vue3';
import { ApiKey } from '@/types/ApiKey';

interface Props {
  apiKeys: ApiKey[];
}

const props = defineProps<Props>();

const confirmDelete = (apiKey: ApiKey) => {
  if (confirm('Are you sure you want to delete this API key?')) {
    router.delete(route('apiKeys.destroy', { apiKey: apiKey.id }));
  }
};
</script>
