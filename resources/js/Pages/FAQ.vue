<template>
    <app-layout :title="__n('faq')">

        <template #default>
            <div class="py-5 border-bottom border-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <h2 class="fs-2 text-center">
                                    <span class="fw-normal">Explore | </span>
                                    <span class="fw-bold">FAQs</span>
                                </h2>
                                <!-- <p class="text-center mb-0">Discover The Best Lawyers Near You</p> -->
                            </div>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-decoration-none">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">FAQs</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section faqs-section py-5">
                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-12">
                            <div v-if="getPageContentType('faq_page_description') == 'textarea'
                                ">
                                <div v-html="getPageContent('faq_page_description')"></div>
                            </div>
                            <div v-else-if="getPageContentType('faq_page_description') == 'text'
                                ">
                                <p>{{ getPageContent("faq_page_description") ?? "-" }}</p>
                            </div>
                            <div v-else class="col-12">
                                ----------------------
                            </div>
                        </div>

                        <div class="col-12" v-if="faq_categories.length > 0">
                            
                                
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item" v-for="cat in faq_categories" :key="cat.id">
                                    <h2 class="accordion-header" :id="'heading' + cat.id">
                                        <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                                            :data-bs-target="'#collapse' + cat.id" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <div
                                                class="d-flex w-100 flex-column flex-lg-row align-items-lg-center justify-content-between px-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-question-circle me-3 fs-3"></i>
                                                    <span>{{ cat.name }}</span>
                                                </div>


                                            </div>
                                        </button>
                                    </h2>
                                    <div :id="'collapse' + cat.id" class="accordion-collapse collapse show"
                                        :aria-labelledby="'#collapse' + cat.id" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion" id="accordionExample2">
                                                <div class="accordion-item" v-for="faq in cat.faqs" :key="faq.id">
                                                    <h2 class="accordion-header" :id="'faq-heading' + faq.id">
                                                        <button class="accordion-button shadow-none" type="button"
                                                            data-bs-toggle="collapse"
                                                            :data-bs-target="'#collapse-faq' + faq.id" aria-expanded="true"
                                                            aria-controls="collapseTwo">
                                                            <div
                                                                class="d-flex w-100 flex-column flex-lg-row align-items-lg-center justify-content-between px-3">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="bi bi-question-circle me-3 fs-3"></i>
                                                                    <span>{{ faq.name }}</span>
                                                                </div>


                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div :id="'collapse-faq' + faq.id"
                                                        class="accordion-collapse collapse show"
                                                        :aria-labelledby="'#collapse-faq' + faq.id"
                                                        data-bs-parent="#accordionExample2">
                                                        <div class="accordion-body" v-html="faq.description">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="col-12 text-center">
                            <record-not-found></record-not-found>
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
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import RecordNotFound from "../Components/Shared/RecordNotFound.vue";
export default defineComponent({
    components: {
        AppLayout,
        Navbar,
        PageHeader,
        RecordNotFound
    },
    props: ['faq_categories']
});
</script>
