<template>
  <app-layout title="Dashboard">
    <template #header>
      <!-- <page-header>
                {{ __('find your favorite event') }}
            </page-header> -->
    </template>
    <template #default>
      <div class="border-bottom border-dark py-5">
        <div class="container">
          <div class="row row mx-0">
            <div  v-if="
                getPageContentType('events_page_description') == 'textarea'
              " class="col-12 text-center">
                     <div v-html="getPageContent('events_page_description')"></div>
            </div>
            <div  v-else-if="
                getPageContentType('events_page_description') == 'text'
              " class="col-12 text-center">
               <p>{{ getPageContent("lawyers_page_description") ?? "-" }}</p>
            </div>
            <div v-else class="col-12 text-center">
              <p class="fs-2 mb-0">
                Hello Isabella |
                <span class="fw-bold"
                  >{{ __("Event") }} {{ __n("Details") }}</span
                >
              </p>
              <!-- <p>Discover The Best Lawyers Near You</p> -->
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                  <a href="#" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#" class="text-decoration-none text-dark">Event</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  Event Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="section general-pages py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-12">
              <div
                class="d-flex overflow-hidden text-center justify-content-center"
              >
                <img
                  class="img-fluid w-100 rounded"
                  :src="event.image"
                  alt="Events"
                />
              </div>
            </div>
            <div class="col-lg-7 col-md-12">
              <div class="d-flex flex-column justify-content-center h-100 mt-3">
                <h3>{{ event.name }}</h3>
                <!-- <i class="bi bi-people-fill me-2 text-primary"></i>
                    <span class="text-primary">{{ __("organizer") }}:</span> -->
                <div class="d-flex justify-content-between flex-wrap fs-6">
                  <div v-if="event.lawyer">
                    {{ __("organizated by") }}
                    <Link
                      :href="
                        route('lawyer.profile', {
                          user_name: event.lawyer.user_name,
                        })
                      "
                      class="text-decoration-none"
                    >
                      {{ event.lawyer_name }}
                    </Link>
                    <span
                      type="button"
                      class="badge bg-primary m-1"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Organized By"
                      >Lawyer</span
                    >
                    <!-- <button
                      type="button"
                      class="btn btn-primary"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="lawyer"
                    >
                      Tooltip on top
                    </button> -->
                    <span
                      type="button"
                      v-if="event.event_category_name"
                      class="badge bg-secondary m-1"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Event Category"
                    >
                      {{ event.event_category_name ?? "-" }}</span
                    >
                  </div>
                  <div v-else-if="event.law_firm">
                    {{ __("organizated by") }}
                    <Link
                      :href="
                        route('law_firm.profile', {
                          user_name: event.law_firm.user_name,
                        })
                      "
                      class="text-decoration-none"
                    >
                      {{ event.law_firm.law_firm_name }}
                    </Link>
                    <span
                      type="button"
                      class="badge bg-primary m-1"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Organized By"
                      >LawFirm</span
                    >
                    <span
                    type="button"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Event Cateogry"
                      v-if="event.event_category_name"
                      class="badge bg-secondary m-1"
                    >
                      {{ event.event_category_name ?? "-" }}</span
                    >
                  </div>
                  <div v-else>
                    {{ __("organizated by") }}
                    <span
                    type="button"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Organized By"
                    class="badge bg-primary m-1">Admin</span>
                    <span
                    type="button"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Event Cateogry Name"
                      v-if="event.event_category_name"
                      class="badge bg-secondary m-1"
                    >
                      {{ event.event_category_name ?? "-" }}</span
                    >
                  </div>
                  <!-- <span class="d-none d-md-block">   |  </span>
                  <div class="" style="width: 300px">
                    Share event
                    <i class="bi bi-people-fill ms-2 text-primary me-2"></i>
                    <i class="bi bi-people-fill text-primary me-2"></i>
                    <i class="bi bi-people-fill text-primary me-2"></i>
                    <i class="bi bi-people-fill text-primary me-2"></i>
                    <i class="bi bi-people-fill text-primary me-2"></i>
                    <i class="bi bi-people-fill text-primary me-2"></i>
                  </div> -->
                </div>
                <div class="mt-3 border-readius">
                  <!-- <button class="btn btn-primary text-capitalize fs-6">
                    get your ticket now
                  </button> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="">
                      <p class="my-4 text-break fs-6">
                        {{ event.description }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12"></div>
                  <div class="col-md-6 mb-3">
                    <div class="card card-evendetail h-100 border-0 p-3 fs-6">
                      <span class="mb-3">
                        <i class="bi bi-calendar3 me-2 text-dark"></i>
                        <span class="fw-bold">When</span>
                      </span>
                      <!-- <span class="text-primary">{{ __("start date") }}</span> -->
                      <div>{{ getFormattedDate(event.starts_at) }}</div>
                      till

                      <!-- <i class="bi bi-calendar3 me-2 text-primary"></i> -->
                      <!-- <span class="text-primary">{{ __("end date") }}:</span> -->
                      <div>{{ getFormattedDate(event.ends_at) }}</div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="card card-evendetail h-100 border-0 p-3 fs-6">
                      <span class="mb-3">
                        <i class="bi bi-geo-alt-fill me-2 text-dark"></i>
                        <span class="fw-bold">where</span>
                      </span>
                      <!-- <span class="text-primary">{{ __("location") }}:</span> -->
                      <div>
                        {{ event.address_line_1 }} {{ event.address_line_2 }}
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <!-- <div class="col-6 mb-3">
                    <i class="bi bi-people-fill me-2 text-primary"></i>
                    <span class="text-primary">{{ __("organizer") }}:</span>
                    <div v-if="event.lawyer">
                      {{ __("organizated by") }}
                      <Link
                        :href="
                          route('lawyer.profile', {
                            user_name: event.lawyer.user_name,
                          })
                        "
                        class="text-decoration-none"
                      >
                        {{ event.lawyer_name }}
                      </Link>
                    </div>
                    <div v-if="event.law_firm">
                      {{ __("organizated by") }}
                      <Link
                        :href="
                          route('law_firm.profile', {
                            user_name: event.law_firm.user_name,
                          })
                        "
                        class="text-decoration-none"
                      >
                        {{ event.law_firm.law_firm_name }}
                      </Link>
                    </div>
                  </div>  -->

                  <!-- <div class="col-md-12">
                                            <span class="text-dark fw-bold fs-4">{{ __('sponsors') }}</span>
                                            <div
                                        >
                                        <div v-if="event.sponsers && event.sponsers.length > 0">
                                            <div v-for="(sponser,index) in event.sponsers" :key="index">
                                                <img
                                                class="img-fluid my-2"
                                                :src="sponser.image"
                                                alt="Events"
                                                style="max-height: 75px;"
                                            /> <br>
                                          <span>{{ sponser.name }}</span>
                                            </div>
                                        </div>

                                        </div>
                                        </div> -->
                </div>
              </div>
            </div>

            <!-- <hr class="border border-dark mt-3" />
            <div class="col-12">
                                <div class="">
                                    <p class="mb-0">
                                        {{ event.description }}
                                    </p>
                                </div>
                            </div> -->
          </div>
        </div>
        <div
          class="section general-pages mt-5"
          style="background-color: #f6f6f6"
        >
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <span class="text-dark fw-bold fs-4">{{ __("sponsors") }}</span>
                <p class="my-4 fs-6">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Perferendis natus at, omnis iusto suscipit atque amet
                  voluptate distinctio possimus tempore quisquam rem? Quo quod
                  laudantium dignissimos quam minus corporis dolorem.
                </p>
                <div class="row">
                  <div
                    class="col-md-2"
                    v-for="(sponser, index) in event.sponsers"
                    :key="index"
                  >
                    <!-- <div
                  v-if="event.sponsers && event.sponsers.length > 0"
                > -->
                    <div class="mb-4">
                      <div
                        class="card p-3 border-0 shadow h-100 card-sponser d-flex justify-content-center align-items-center"
                      >
                        <img
                          class="img-fluid my-2"
                          :src="sponser.image"
                          alt="Events"
                          style="height: auto; width: 150px"
                        />
                        <!-- <span class="text-center">{{ sponser.name }}</span> -->
                      </div>
                    </div>
                    <!-- </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    Link,
  },
  props: ["event"],
  created() {
    console.log("event", this.event);
  },
});
</script>
