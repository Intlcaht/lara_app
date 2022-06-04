<!-- AppHead.vue -->

<template>

    <Head :title="title ? `${title}` : 'IntlCaht'">
        <link rel="shortcut icon" type="image/png" href="/images/favicon.ico" />
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
