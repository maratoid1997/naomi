    <template>
    <div class="special-offer flex">
        <div class="special-offer__info">
            <p class="special-offer__label">{{ $t("special_offer") }}</p>
            <a class="special-offer__title" :href="banner.url" rel="noopener" target="_blank">
                {{ banner.title }}
            </a>
        </div>
        <a
            rel="noopener"
            target="_blank"
            :href="banner.url"
            class="special-offer__image"
        >
            <img :src="banner.image" :alt="banner.title" class="img-contained" />
        </a>
    </div>
</template>

<script>
export default {
    props: {
        banner: {
            type: Object,
            required: true
        }
    },
};
</script>
