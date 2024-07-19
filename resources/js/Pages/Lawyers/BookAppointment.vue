<template>
  <app-layout title="My Profile">
    <template #header> </template>
    <div class="container-fluid py-5 border-bottom border-dark">
      <div class="row">
        <div class="col-12">
          <h2 class="fs-2 text-center">
            <span class="fw-normal"
              >{{ __("Hello") }} {{ $page.props.auth.user.name }} |
            </span>
            <span class="fw-bold">{{ __("make an appointment") }}</span>
          </h2>
          <!-- <p class="text-center mb-0">{{ __("discover The Best Lawyers Near You") }}</p> -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item">
                <a href="#" class="text-dark text-decoration-none">Home</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Make An Appointment
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="section pt-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <Wizard
              @change="onChangeCurrentTab"
              :verticalTabs="isMobileScreen"
              scrollable-tabs
              hideButtons
              :custom-tabs="[
                {
                  title: 'Schedule Appointment',
                },
                {
                  title: 'Make a Payment',
                },
                {
                  title: 'Thanks for Booking',
                },
              ]"
            >
              <div v-if="currentTabIndex === 0">
                <div class="row" v-if="fetching">
                  <div class="col-md-12">
                    <div class="skeleton-structure">
                      <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-end">
                          <div
                            style="width: 160px; height: 40px"
                            class="bg-skeleton mb-2 p-3 rounded-5"
                          ></div>
                        </div>
                      </div>
                      <div class="row">
                        <div
                          class="card shadow p-3 border-0"
                          style="max-width: initial"
                        >
                          <div
                            style="width: 180px; height: 20px"
                            class="bg-skeleton mb-2 p-3 me-2 rounded-2 mb-4"
                          ></div>

                          <div>
                            <ul class="list-unstyled d-flex flex-wrap">
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-end">
                          <div
                            style="width: 160px; height: 40px"
                            class="bg-skeleton mb-2 p-3 rounded-5"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" v-else-if="!paymentScreen">
                  <div class="col-12" v-if="is_schedule_required">
                    <div class="d-md-flex justify-content-between mb-4">
                      <label for="starts_at" class="fs-4">{{__("please select date and time")}}</label>
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                      >
                        <i class="bi bi-calendar-date me-2"></i> {{__("Select Date")}}
                      </button>
                    </div>
                  </div>
                  <div class="col-12 time-slots-list">
                    <div class="card p-3 mb-4">
                      <div v-if="is_schedule_required">
                        <div v-if="fetchedSchedule">
                          <ul class="list-unstyled d-flex flex-wrap mb-0">
                            <li
                              style="cursor: pointer"
                              class="my-1 p-2 me-2 rounded border border-primary"
                              v-for="(
                                slot, index
                              ) in fetchedSchedule.schedule_slots"
                              :key="index"
                              :class="
                                selected_slot_index === index
                                  ? 'bg-primary bg-opacity-50'
                                  : ''
                              "
                              @click="selectSlot(index, slot)"
                            >
                              <span
                                >{{ slot.start_time }}
                                --
                                {{ slot.end_time }}</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="p-5 text-center" v-else>
                          <i
                            class="bi bi-exclamation-circle-fill fs-1 text-primary"
                          ></i>
                          <br />
                          <h4 class="fw-normal">
                            {{
                              __("schedule is not available against this date")
                            }}
                          </h4>
                        </div>
                      </div>
                      <div v-else>
                        <div v-if="fetchedSchedule">
                          <div>
                            <div
                              class="d-flex align-items-center justify-content-center py-4"
                            >
                              <div class="d-flex">
                                <h3 class="mb-0 text-capitalize me-3 fw-bold">
                                  {{ __("fee") }}:
                                </h3>
                                <span class="fs-4">
                                    {{$page.props.settings.currency_symbol}} {{ fetchedSchedule ? fetchedSchedule.fee : '' }}</span
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="p-5 text-center" v-else>
                          <i
                            class="bi bi-exclamation-circle-fill fs-1 text-primary"
                          ></i>
                          <br />
                          <h4 class="fw-normal">
                            {{
                              __("schedule is not available against this date")
                            }}
                          </h4>
                        </div>
                      </div>
                    </div>
                    <div class="p-3 card">
                      <div class="row align-items-center">
                        <div class="col-md-10">
                          <div class="row">
                            <div class="col-md-4">
                              <div
                                class="border-end border-2 border-primary pe-4"
                                style="width: fit-content"
                              >
                                <label
                                  class="fs-6 d-block fw-bold text-capitalize"
                                >
                                  {{ __("lawyer name") }}</label
                                >
                                <span class="small fw-normal"
                                  >{{ lawyer.first_name ?? "" }}
                                  {{ lawyer.last_name ?? "" }}</span
                                >
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label class="fs-6 fw-bold text-capitalize">
                                {{ __("fee") }}</label
                              >
                              <br />
                              <span class="small fw-normal">{{$page.props.settings.currency_symbol}} {{
                                fetchedSchedule ? fetchedSchedule.fee : ''
                              }}</span>
                            </div>

                            <div class="col-md-3">
                              <label class="fs-6 fw-bold text-capitalize">
                                {{ __("date") }}</label
                              >
                              <br />
                              <span class="small fw-normal">{{
                                getFormattedDate(selected_date)
                              }}</span>
                            </div>
                            <div class="col-md-3" v-if="is_schedule_required">
                              <label class="fs-6 fw-bold text-capitalize">
                                {{ __("slot") }}</label
                              >
                              <br />
                              <span class="small fw-normal"
                                >{{ selected_start_time }} --
                                {{ selected_end_time }}</span
                              >
                            </div>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <button
                            type="button"
                            class="btn btn-primary"
                            :disabled="!form.selected_schedule_id && is_schedule_required"
                            @click="
                              continuePaymentScreen(), onChangeCurrentTab(1)
                            "
                          >
                            {{ __("continue") }}
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div v-if="currentTabIndex === 1">
                <div class="row">
                  <validation-errors></validation-errors>

                  <div class="mt-3">
                    <h5 class="mb-4">
                       {{ __("Make Payment for") }} {{ appointment_type_name }}
                    </h5>
                    <div class="payment-tabs p-3 card">
                      <div class="p-3 mb-4 rounded bg-primary-light">
                        <div class="row">
                          <div class="col-md-3">
                            <label class="fs-6 text-capitalize">
                              {{ __("lawyer name") }}</label
                            >
                            <br />
                            <span class="small fw-normal"
                              >{{ lawyer.first_name ?? "" }}
                              {{ lawyer.last_name ?? "" }}</span
                            >
                          </div>
                          <div class="col-md-3">
                            <label class="fs-6 text-capitalize">
                              {{ __("fee") }}</label
                            >
                            <br />
                            <span class="small fw-normal">{{$page.props.settings.currency_symbol}} {{
                              fetchedSchedule ? fetchedSchedule.fee : ''
                            }}</span>
                          </div>

                          <div class="col-md-3">
                            <label class="fs-6 text-capitalize">
                              {{ __("date") }}</label
                            >
                            <br />
                            <span class="small fw-normal">{{
                              getFormattedDate(selected_date)
                            }}</span>
                          </div>
                          <div class="col-md-3" v-if="is_schedule_required">
                            <label class="fs-6 text-capitalize">
                              {{ __("slot") }}</label
                            >
                            <br />
                            <span class="small fw-normal"
                              >{{ selected_start_time }} --
                              {{ selected_end_time }}</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="row px-3">
                        <label class="mb-3" for="card-element">{{
                          __("card details")
                        }}</label>
                        <div ref="cardElement"></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mt-5">
                    <h5 class="mb-4 text-capitalize">
                      {{ __("ask your question") }}
                    </h5>
                    <div class="card rounded p-3">
                      <div class="ps-0">
                        <label for="question" class="text-capitalize mb-3">{{
                          __("question")
                        }}</label>
                        <textarea
                          class="w-100 form-control px-3"
                          v-model="form.question"
                          cols="50"
                          rows="6"
                        ></textarea>
                      </div>
                      <div class="ps-0 mb-3 mt-4">
                        <label for="attachment" class="text-capitalize mb-3">{{
                          __("attachment")
                        }}</label>

                        <input
                          class="w-100 custom-file-input"
                          placeholder="Please Enter"
                          type="file"
                          id="attachment_file"
                          ref="attachment_file"
                          @change="processFile($event)"
                          name="attachment_file"
                        />
                        <img
                          v-if="attachment_view"
                          :src="attachment_view"
                          height="100"
                          width="100"
                          class="mt-2"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="mt-4 text-end">
                      <button
                        type="button"
                        class="btn btn-secondary me-2"
                        @click="
                          () => (
                            (this.paymentScreen = false), onChangeCurrentTab(0)
                          )
                        "
                      >
                        {{ __("back") }}
                      </button>
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-secret="{{ $intent->client_secret }}"
                        @click="bookAppointment"
                        :disabled="form.processing"
                      >
                        {{ __("book appointment") }}
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div v-if="currentTabIndex === 2">
                <div v-if="paymentDone" class="thank-you-section mt-5">
                  <div class="p-3 mb-4 rounded-lg bg-primary-light">
                    <div class="row align-items-center">
                      <div class="col-12 p-4 text-center">
                        <i class="bi bi-envelope fs-1"></i>
                        <p class="fs-4 mb-0 fw-bold"> {{ __("Thank You") }}</p>
                        <p class="fs-4 mb-0">
                          {{ __("For Your Payment") }} ${{ fetchedSchedule ? fetchedSchedule.fee : '' }}
                        </p>
                        <p class="fs-4 mb-0">
                            {{ __("Appointment No") }} {{ bookedAppointmentDetail.id }}
                        </p>
                        <p class="fs-4 mb-0">
                          {{ __("Payment Status") }}
                          {{
                            bookedAppointmentDetail.is_paid ? "Paid" : "UnPaid"
                          }}
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="mt-5 text-center">
                    <!-- <p class="fs-4 mb-0 fw-bold">Video Call starts in</p> -->
                    <!-- <p class="fs-2 text-primary">00:52</p> -->
                    <Link
                      :href="route('appointment_log')"
                      class="btn btn-primary"
                    >
                      <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                      </span>
                      <span class="button-text">{{
                        __("View Appointment Log")
                      }}</span>
                    </Link>
                  </div>
                </div>
              </div>
            </Wizard>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
              <div class="form-group mb-3">
                <div class="card shadow d-flex align-items-center p-3">
                  <VueDatePicker
                    inline
                    auto-apply
                    v-model="selected_date"
                    @update:model-value="fetchAvailableSlots"
                  ></VueDatePicker>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import CalenderSkeleton from "@/Components/Skeleton/CalenderSkeleton.vue";
import { loadStripe } from "@stripe/stripe-js";
import Wizard from "form-wizard-vue3";
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    ValidationErrors,
    CalenderSkeleton,
    Wizard,
    Link,
  },
  props: [
    "schedule",
    "lawyer_id",
    "appointment_type_id",
    "is_schedule_required",
    "lawyer",
    "appointment_type_name",
  ],
  created() {
    this.selected_date = ref(new Date());
    this.fetchedSchedule = this.schedule;
  },
  data() {
    return {
      stripe: {},
      cardElement: {},
      currentTabIndex: 0,
      selected_date: "",
      paymentScreen: false,
      fetchedSchedule: "",
      fetching: false,
      selected_slot_index: "",
      selected_start_time: "",
      selected_end_time: "",
      attachment_view: "",
      form: this.$inertia.form({
        selected_schedule_id: "",
        lawyer_id: this.lawyer_id,
        date: this.selected_date,
        appointment_type_id: this.appointment_type_id,
        question: "",
        attachment: "",
        stripe_token: "",
      }),
      windowWidth: window.innerWidth,
      isMobileScreen: true,
      paymentDone: false,
      bookedAppointmentDetail: "",
    };
  },
  methods: {
    onChangeCurrentTab(index, oldIndex) {
      this.currentTabIndex = index;
    },
    fetchAvailableSlots() {
      this.form.selected_schedule_id = "";
      this.selected_slot_index = "";
      this.selected_start_time = "";
      this.selected_end_time = "";
      this.fetching = true;
      axios
        .get(
          this.route("getApiAppointmentScheduleSlots", {
            selected_date: this.selected_date,
            lawyer_id: this.lawyer_id,
            appointment_type_id: this.appointment_type_id,
          })
        )
        .then((res) => {
          this.fetchedSchedule = res.data.data ?? "";
          this.fetching = false;
        });
    },
    selectSlot(index, slot) {
      if (
        this.form.selected_schedule_id &&
        this.form.selected_schedule_id == slot.id
      ) {
        this.form.selected_schedule_id = "";
        this.selected_slot_index = "";
        this.selected_start_time = "";
        this.selected_end_time = "";
      } else {
        this.form.selected_schedule_id = slot.id;
        this.selected_slot_index = index;
        this.selected_start_time = slot.start_time;
        this.selected_end_time = slot.end_time;
      }
    },
    processFile(event) {
      this.form.attachment = event.target.files[0];
      if (event.target.files[0].type.includes("image")) {
        this.attachment_view = URL.createObjectURL(event.target.files[0]);
      } else {
        this.attachment_view = "";
      }
    },
    async continuePaymentScreen() {
      this.paymentScreen = true;
      await this.initializeStripe();
    },
    async initializeStripe() {
        if (this.$page.props.settings.stripe_key) {
        const stripe_key = this.$page.props.settings.stripe_key;
        const stripe = await loadStripe(stripe_key);
        const elements = stripe.elements();

        const cardElement = elements.create("card");
        cardElement.mount(this.$refs.cardElement);

        this.stripe = stripe;
        this.cardElement = cardElement;
        }
    },
    async bookAppointment() {
      if (this.$page.props.auth) {
        await this.stripe
          .createToken(this.cardElement, {
            card: this.cardElement,
          })
          .then((result) => {
            if (result.error) {
              // Handle token creation error
              this.$toast.error(result.error.message);
            } else {
              // Token created successfully
              this.form.stripe_token = result.token;
              this.form.date = this.selected_date;
              this.form.post(this.route("customers.book_appointment"), {
                onSuccess: (resp) => {
                  console.log(resp.props.response_data.appointment);
                  this.bookedAppointmentDetail =
                    resp.props.response_data.appointment;
                  this.onChangeCurrentTab(2);
                  this.paymentDone = true;
                },
              });
            }
          });
      }
    },
    onResize() {
      this.windowWidth = window.innerWidth;
      if (this.windowWidth < 768) {
        this.isMobileScreen = false;
      }
    },
  },
  mounted() {
    this.$nextTick(() => {
      window.addEventListener("resize", this.onResize);
    });
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  },
});
</script>

<style lang="scss" scoped>
.time-slots-list ul li {
  width: 125px;
  text-align: center;
}

.time-slots-list ul li span {
  font-size: 12px;
}

.form-wizard-vue .fw-step-active {
  background: #fac14d !important;
}
</style>
