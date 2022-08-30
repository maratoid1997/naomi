<template>
  <section class="page">
    <breadcrumbs :items="breadcrumbs" />

    <b-container fluid>
      <b-row>
        <b-col>
          <section-header :title="$t('order_history')" />

          <div class="orders-table">
            <table>
              <thead>
                <tr>
                  <th>{{ $t("order.code") }}</th>
                  <th>{{ $t("order.date") }}</th>
                  <th>{{ $t("order.payment_type") }}</th>
                  <th>{{ $t("order.payment_status") }}</th>
                  <th>{{ $t("order.order_status") }}</th>
                  <th>{{ $t("order.price") }}</th>
                  <th>{{ $t("order.details") }}</th>
                  <th>{{ $t("order.reject") }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>{{order.id}}</p>
                  </td>
                  <td>
                    <p>{{order.date}}</p>
                  </td>
                  <td>
                    <p>{{order.paymentType}}</p>
                  </td>
                  <td>
                    <p>{{order.paymentStatus}}</p>
                  </td>
                  <td>
                    <p class="status">{{order.orderStatus}}</p>
                  </td>
                  <td>
                    <p class="data-price">
                      {{order.price}}
                      <i class="icon-azn"></i>
                    </p>
                  </td>
                  <td>
                    <nuxt-link class="see-more" :to="$localePath('profile-orders-order', { order: order.id })">
                      <i class="icon-eye"></i>
                    </nuxt-link>
                  </td>
                  <td>
                    <button class="reject-order" :disabled="order.rejected" @click="rejectOrder(order.id)">
                      <div class="icon-minus-circled"></div>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- orders table -->

          <div class="data-table products-table">
            <table>
              <thead>
                <tr>
                  <th>{{ $t("product.image") }}</th>
                  <th>{{ $t("product.name") }}</th>
                  <th>{{ $t("product.model") }}</th>
                  <th>{{ $t("product.price") }}</th>
                  <th>{{ $t("product.count") }}</th>
                  <th>{{ $t("coupon") }}</th>
                  <th style="text-align: left;">{{ $t("gift_certificate") }}</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="product in orderProducts" :key="product.id">
                  <td>
                    <div class="data-image">
                      <img :src="product.image" alt="Product image" />
                    </div>
                  </td>
                  <td>
                    <p class="data-name">{{ product.title }}</p>
                  </td>
                  <td>
                    <p class="data-model">{{ product.sku }}</p>
                  </td>
                  <td>
                    <p class="data-price">
                      <span v-html="$calculatePrice(product.price)" />
                    </p>
                  </td>
                  <td>
                    <p class="data-count">{{ product.quantity }}</p>
                  </td>
                  <td>
                    <p class="data-coupon">{{ product.promo_action ? product.promo_action : "-" }}</p>
                  </td>
                  <td style="text-align: left">
                    <p class="data-gift-certificate">{{ product.gift_certificate ? product.gift_certificate : "-" }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- data table -->

        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>
import { mapState } from "vuex";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
  name: "order-details-page",
  components: {
    Breadcrumbs,
    SectionHeader
  },
  computed: {
    ...mapState({
      breadcrumbs: ({ user }) => user.breadcrumbs,
      order: ({ user }) => user.item,
      orderProducts: ({ user }) => user.orderProducts
    }),
  },
  methods: {
    rejectOrder(orderId) {
      this.$bvModal.msgBoxConfirm(this.$t("confirm_operation"), {
        size: "sm",
        centered: true,
        bodyClass: "text-center",
        footerClass: "justify-content-around",
        cancelVariant: "danger",
        cancelTitle: this.$t("reject"),
        okTitle: this.$t("submit")
      })
        .then((value) => {
          if (value) {
            this.$nuxt.$loading.start();
            this.$store
              .dispatch("user/rejectOrder", orderId)
              .then(async () => {
                await this.$store.dispatch("user/getOrderDetails", orderId);
                this.$toast.success(this.$t("successfull_operation"));
              })
          }
        });
    }
  },
  async asyncData({ params, store }) {
    await store.dispatch("user/getOrderDetails", params.order);
  }
};
</script>
