<template>
  <div>
    <div class="container-fluid py-5 border-bottom border-dark">
      <div class="row">
        <div class="col-12">
          <h2 class="fs-2 text-center">
            <span class="fw-normal">{{ __("Hello") }} {{ $page.props.auth.user.name }} |
            </span>
            <span class="fw-bold">{{ __("appointment detail") }}</span>
          </h2>
          <!-- <p class="text-center mb-0">{{ __("discover The Best Lawyers Near You") }}</span> -->
        </div>
        <breadcrums :breadcrums="breadcrums"></breadcrums>
      </div>
    </div>
    <div class="section py-5">
      <div class="container">

        <div class="px-4 mb-0 rounded py-4" style="background-color: #fff3db">
          <div class="row" v-if="appointment.appointment_status_code == 1">
            <div class="col-md-6">
              <p class="mb-0">{{ __("Please accept the appointment from customer") }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-end flex-wrap">
              <button type="updatenStatus" @click="updateAppointmentStatus(2)" class="btn btn-primary me-lg-3 me-0 px-5">
                {{ __("accept") }}
              </button>
              <button type="button" @click="updateAppointmentStatus(3)" class="btn btn-danger px-5">
                {{ __("reject") }}
              </button>
            </div>
          </div>
          <div class="row" v-if="appointment.appointment_status_code == 5">
            <div class="col-md-6">
              <p class="mb-0">{{ __("Appointment has been completed") }}</p>
            </div>
        </div>
          <div v-if="appointment.appointment_type_id == 1 && appointment.appointment_status_code != 5">

            <video-call-component @showCompletedButton="() => this.showMarkedAsCompletedButton = true" :appointment="appointment"></video-call-component>

          </div>
          <div v-if="appointment.appointment_type_id == 2 && appointment.appointment_status_code != 5">
            <audio-call-component @showCompletedButton="() => this.showMarkedAsCompletedButton = true"  :appointment="appointment"></audio-call-component>
          </div>
          <div v-if="appointment.appointment_type_id == 3 && appointment.appointment_status_code == 2">
            <chat-component @showCompletedButton="() => this.showMarkedAsCompletedButton = true"  :appointment="appointment"></chat-component>
          </div>

          <div class="row justify-content-end" v-if="showMarkedAsCompletedButton">
            <div class="col-md-6 d-flex justify-content-end flex-wrap">
              <div class="mt-4" v-if="appointment.appointment_status_code == 2">
                <button type="updatenStatus" @click="updateAppointmentStatus(5)" class="btn btn-primary px-5">
                  {{ __("mark as complete") }}
                </button>
              </div>
            </div>
          </div>
          <div class="mb-0 rounded" style="background-color: #fff3db">
            <div v-if="appointment.appointment_status_code == 5 && userRating">
              <div class="col-md-4 d-flex">
                <div class="d-flex align-items-center mb-3">
                  <div>
                    <h5 class="mb-0 text-capitalize">
                      {{ __("your feedback") }}
                    </h5>
                    <b>{{ __("rating") }}: </b>
                    <star-rating :rating="userRating.rating" :star-size="20" :read-only="true" :increment="0.01"
                      :show-rating="false"></star-rating>
                    <b>{{ __("comment") }}: </b> {{ userRating.comment }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">


            <div class="pt-4">
              <div class="row">
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-calendar-x fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("booking date") }}
                      </h5>
                      <span>{{ appointment.date }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-clock-history fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("start time") }}
                      </h5>
                      <span>{{ appointment.start_time }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-clock-history fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">{{ __("end time") }}</h5>
                      <span>{{ appointment.end_time }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">{{ __("customer") }}</h5>
                      <span>{{ appointment.customer_name }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-clipboard-check fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("appointment status") }}
                      </h5>
                      <span>{{ appointment.appointment_status_name }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-webcam fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("appointment type") }}
                      </h5>
                      <span>{{ appointment.appointment_type_name }}</span>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-check2-square fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("payment status") }}
                      </h5>
                      <span>
                        {{ appointment.is_paid ? __("paid") : __("un Paid") }}
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-coin fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("fee") }}
                      </h5>
                      <span>
                        {{$page.props.settings.currency_symbol}} {{ appointment.fee  }}
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-question-circle fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">{{ __("question") }}</h5>
                      <span>{{ appointment.question }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                      <i class="bi bi-file-earmark-post fs-1 text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("attachment") }}
                      </h5>
                      <img :src="appointment.attachment_url" height="100" width="100" v-if="appointment.attachment_url"
                        alt="" />
                      <span v-else>{{ __("n/a") }}</span>
                    </div>
                  </div>
                </div>
              <div
                v-if="appointment.appointment_status_code == 5 && userRating"
              >
                <div class="col-md-4 d-flex">
                  <div class="d-flex align-items-center mb-3">
                    <div>
                      <h5 class="mb-0 text-capitalize">
                        {{ __("your feedback") }}
                      </h5>
                      <b>{{ __("rating") }}: </b>
                      <star-rating
                        :rating="userRating.rating"
                        :star-size="20"
                        :read-only="true"
                        :increment="0.01"
                        :show-rating="false"
                      ></star-rating>
                      <b>{{ __("comment") }}: </b> {{ userRating.comment }}
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div
                  class="modal fade"
                  id="ratingModel"
                  tabindex="-1"
                  aria-labelledby="ratingModelLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ratingModelLabel">
                            {{ __("rate now") }}
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <label for="rating">{{ __("rating") }}:</label>
                        <div class="rating text-center fs-3 text-warning">
                          <star-rating
                            v-model="form.rating"
                            @update:rating="setRating"
                            :star-size="25"
                          ></star-rating>
                        </div>
                        <div class="form-group">
                          <label for="comment">{{ __("comment") }}:</label>
                          <textarea
                            v-model="form.comment"
                            class="form-control"
                            id=""
                            cols="30"
                            rows="3"
                          ></textarea>
                          <span v-if="form.errors.comment">
                            {{ form.errors.comment }}
                          </span>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          id="close"
                          data-bs-dismiss="modal"
                        >
                          {{ __("close") }}
                        </button>
                        <button
                          type="button"
                          @click="submit"
                          class="btn btn-primary"
                        >
                          {{ __("submit") }}
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import ChatComponent from "@/Components/Shared/Appointment/ChatComponent.vue";
import VideoCallComponent from "@/Components/Shared/Appointment/VideoCallComponent.vue";
import AudioCallComponent from "@/Components/Shared/Appointment/AudioCallComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrums from "../../../Components/Shared/Breadcrums.vue";

export default defineComponent({
  components: {
    Head,
    AppLayout,
    AudioCallComponent,
    VideoCallComponent,
    ChatComponent,
    ValidationErrors,
    Link,
    Breadcrums,
  },
  props: ["appointment"],
  computed: {
    userRating() {
      var variable = this.appointment.ratings.find(
        (rating) =>
          rating.fromable_type == this.$page.props.auth.logged_in_as &&
          rating.fromable_id ==
          this.$page.props.auth.user[this.$page.props.auth.logged_in_as].id
      );
      return variable;
    },
  },
  data() {
    return {
      appointmentStatusForm: this.$inertia.form({
        appointment_id: this.appointment.id,
        status_code: "",
      }),
      form: this.$inertia.form({
        comment: "",
        rating: 0,
        lawyer_id: this.appointment.lawyer_id,
        booked_appointment_id: this.appointment.id,
      }),
      showMarkedAsCompletedButton:false,
      breadcrums: [
        {
          id: 1,
          name: "Home",
          link: "/",
        },
        {
          id: 2,
          name: "My Appointments",
          link: "/appointment_log",
        },
        {
          id: 3,
          name: "Appointment Detail",
          link: "",
        },
      ],
    };
  },
  async created() {
        if (this.appointment.is_started) {
            this.showMarkedAsCompletedButton = true
        }
   },
  methods: {
    close() {
      document.getElementById("close").click();
    },
    resetForm() {
      this.form = this.$inertia.form({
        comment: "",
        rating: 0,
      });
    },
    setRating(rating) {
      this.form.rating = rating;
    },
    updateAppointmentStatus(status_code) {
      this.appointmentStatusForm.status_code = status_code;
      this.appointmentStatusForm
        .transform((data) => ({
          ...data,
        }))
        .post(this.route("appointment_detail.updateStatus"), {
          onSuccess: () => {
            if (status_code == 5) {
              document.getElementById("rate_now_button").click();
            }
          },
        });
    },
    submit() {
      this.form.post(this.route("add_appointment_rating"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          const modalBackdrop = document.querySelector(".modal-backdrop");
          if (modalBackdrop) {
            modalBackdrop.classList.remove("modal-backdrop");
          }
          this.resetForm();
        },
      });
    },
  },
});
</script>

