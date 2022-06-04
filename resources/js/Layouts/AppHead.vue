<!-- AppHead.vue -->

<template>
  <Head :title="title ? `${title}` : 'IntlCaht'">
    <link rel="icon" href="/public/images/favicon.ico" />
    <slot />
  </Head>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Head,
  },
  props: {
    title: String,
  },
}
</script>
