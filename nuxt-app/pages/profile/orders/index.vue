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
                <tr v-for="order in orders" :key="order.id">
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
                    <p>{{order.orderStatus}}</p>
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
  name: "order-history-page",
  components: {
    Breadcrumbs,
    SectionHeader
  },
  computed: {
    ...mapState({
      breadcrumbs: ({ user }) => user.breadcrumbs,
      orders: ({ user }) => user.items
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
                await this.$store.dispatch("user/getOrderHistory");
                this.$toast.success(this.$t("successfull_operation"));
              })
          }
        });
    }
  },
  async asyncData({ store }) {
    await store.dispatch("user/getOrderHistory");
  }
};
</script>
