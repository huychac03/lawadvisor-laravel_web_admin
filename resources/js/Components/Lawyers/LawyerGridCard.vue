<template>
  <div :class="{ 'col-md-3 col-lawyer': add_col, 'w-100': !add_col }">
    <div class="card lawyer-card item-h border-0 py-3" style="min-height:342px">

      <div class="card-body p-0">
        <div class="d-flex mb-3 d-flex mb-3 justify-content-center card-avatar overflow-hidden position-relative">
          <div class="position-absolute d-flex flex-column end-0 position-hover">
            <button type="button"
                class="btn btn-primary me-2 mt-2" v-for="(schedule_type,index) in lawyer.appointment_types" :key="index" @click="checkLoginAndRedirect(lawyer,schedule_type.appointment_type)">
                    <span class="bi bi-camera-video-fill small" v-if="schedule_type.type == 'video'"></span>
                    <span class="bi bi-telephone-fill small" v-if="schedule_type.type == 'audio'"></span>
                    <span class="bi bi-chat-fill small" v-if="schedule_type.type == 'chat'"></span>
                </button> <br>
          </div>

          <img v-if="lawyer.image" class="img-fluid" :src="lawyer.image" alt="lawyer">
          <img v-if="!lawyer.image" class="img-fluid m-3" src="@/images/account/default_avatar_men.png" alt="lawyer">

        </div>
        <!-- <h6 class="text-center mb-2">{{ lawyer.name }} </h6> -->
        <h2 class="fs-6 d-flex align-items-center justify-content-center text-capitalize mb-1">
          <i v-if="lawyer.is_featured" class="bi bi-patch-check-fill fs-5 me-2 text-primary"></i>
          <Link class="text-decoration-none text-dark" :href="route('lawyer.profile', { user_name: lawyer.user_name, })">
          {{
            lawyer.name }} <small v-if="lawyer.law_firm_name" class="text-muted">({{ lawyer.law_firm_name }})</small>
</Link>
          <!-- <span class="fw-bold small ps-1 ms-2" style="border-left:2px solid" v-if="lawyer.distance"> ( {{ formatDecimal(lawyer.distance) }} Km) Away</span> -->
        </h2>
        <div>
          <p class="text-center mb-0 small" v-if="lawyer.distance">
            ( {{ formatDecimal(lawyer.distance) }} Km) Away
          </p>
          <p class="text-center mb-0 small" v-else>

          </p>
        </div>
        <!-- <p class="fs-6 text-center px-3 mb-2" v-for="(cat, index) in lawyer.lawyer_categories" :key="index">{{ cat.name }}</p> -->

        <div class="d-flex justify-content-center my-2">

          <Link :href="route('lawyer.profile', { user_name: lawyer.user_name, })" class="btn btn-primary btn-sm">
          {{ getPageContent('general_book_btn_1_text') ??  __("book appointment") }}
          </Link>
        </div>

        <div class="d-flex align-items-center justify-content-center mb-2" style="color: white;">
          <star-rating :rating="lawyer.rating" :star-size="16" :read-only="true" :increment="0.01"
            :show-rating="false"></star-rating>
          <span class="text-dark small mt-1 ps-1"> ({{
            lawyer.rating
          }}/5)</span>
        </div>

        <div class="d-flex align-items-center justify-content-center">
          <span v-if="lawyer.is_online" class="d-flex text-warning" style="font-size: 14px;">
                      <i class="bi bi-circle-fill"></i> <span class="ms-1"> {{ getPageContent('general_online_text') ?? 'Online' }} </span>
            </span>
          <span v-else class="d-flex text-muted" style="font-size: 14px;">
            <i class="bi bi-circle-fill"></i> <span class="ms-1">{{ getPageContent('general_offline_text') ?? 'Offline'  }} </span>
          </span>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: ['lawyer', 'add_col'],
  created() {
  },
  data() {
    return {
    };
  },
  methods: {
    checkLoginAndRedirect(lawyer, appointment_type) {
      if (this.$page.props.auth) {
        if (this.$page.props.auth.logged_in_as == 'customer') {
          this.$inertia.visit(route(
            'lawyer.book_appointment',
            {
              user_name: lawyer.user_name,
              type: appointment_type.type,
            }
          ))
        }
        else {
          this.$toast.warning("You must log in as a customer");
        }

      } else {
        this.$toast.warning("Please login first");
        this.$inertia.visit(route("login"), {
          data: {
            'is_redirect': 1
          },
        });
      }
    },
  },
});
</script>
