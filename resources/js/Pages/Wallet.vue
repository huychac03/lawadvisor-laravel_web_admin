<template>
    <app-layout>
        <template #default>
            <div class="section p-0 profile">
                <div class="row mx-0 border-bottom border-dark py-5">
                    <div class="col-12 text-center py-3">
                        <p class="fs-2 mb-0">
                            {{ __("hello") }} Jack |
                            <span class="fw-bold">  {{ __("Payment Wallet") }}</span>
                        </p>
                        <p>  {{ __("discover The Best Lawyers Near You") }} </p>
                    </div>
                </div>
                <div class="container">
                    <div class="row py-md-5">
                            <div class="col-12 mt-3">
                                <div class="card rounded-lg border-0 shadow bg-primary p-4 px-md-5">
                                   <div class="d-md-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-3 mb-md-0">
                                            <span class="fs-2 me-3 fw-bold">$250</span> <span class="fw-bold">Available amount</span>
                                        </div>
                                        <div class="text-end text-md-start">
                                            <button class="btn btn-dark">
                                                Add to wallet
                                            </button>
                                        </div>
                                   </div>
                                </div>
                            </div>

                            <div class="col-12 my-5 ">
                                <div class="wallet-table">
                                    <div class="table-responsive">
                                        <table class="table text-center ">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Date and Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Wallet Cash</td>
                                                    <td>$50</td>
                                                    <td>Credit</td>
                                                    <td>20-08-2023</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Wallet Cash</td>
                                                    <td>$50</td>
                                                    <td>Credit</td>
                                                    <td>20-08-2023</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Wallet Cash</td>
                                                    <td>$50</td>
                                                    <td>Credit</td>
                                                    <td>20-08-2023</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Wallet Cash</td>
                                                    <td>$50</td>
                                                    <td>Credit</td>
                                                    <td>20-08-2023</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Wallet Cash</td>
                                                    <td>$50</td>
                                                    <td>Credit</td>
                                                    <td>20-08-2023</td>
                                                </tr>
                                            </tbody>
                                        </table>

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
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";


export default defineComponent({
    components: {
        Head,
        Link,
        AppLayout,
    },

    data() {

    },

    methods: {

    },
});
</script>
