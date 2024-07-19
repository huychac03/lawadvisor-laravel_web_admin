<template>
    <div v-if="fetching">  <div
        class="skeleton-structure time-slots"
    >
        <div class="row p-4 bg-white rounded-5 mx-0">
            <div class="col-md-12 mb-3">
                <div class="description m-0 p-0">
                    <div class="title mb-2" style="width: 150px; height: 20px"></div>
                </div>

                <div class="form-input"></div>
            </div>

        </div>

    </div></div>
    <div v-else>
        <form @submit.prevent="submit" class="profileForm">
        <div class="row">
        <div class="col-md-12">
            <validation-errors></validation-errors>
            <div class="col-12">
            <div class="p-4 bg-primary bg-opacity-10 rounded-5 mx-0">
                <div class="col-12">
                    <div class="form-group">
                        <label for="fee">{{ __('fee') }}</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">{{$page.props.settings.currency_symbol}}</span>
                            <input v-model="form.fee" class="form-control  px-3" placeholder="Please Enter" type="integer" />
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-12">
                <button type="submit" :disabled="form.processing" class="submit btn btn-primary">
                    {{__('update')}}
                </button>
                </div>
            </div>
            </div>

        </div>
        </div>
    </form>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import Multiselect from '@vueform/multiselect'
export default defineComponent({
  components: {
  Head,
  ValidationErrors,
  Link,
  Multiselect,
},
props: ['appointment_type_id','is_schedule_required','appointment_type'],
data() {
  return {
    form: this.$inertia.form({
      appointment_type_id: this.appointment_type_id,
      is_schedule_required: this.is_schedule_required,
      appointment_type: this.appointment_type,
      selected_days:[],
      start_time:"",
      end_time:"",
      fee:"",
      interval:"",
      generated_slots: {}
    }),
    schedule: null,
    fetching: true
  };
},
methods: {
    getAppointmentschedules() {
        this.fetching = true
      axios.get(this.route('lawyer.getApiAppointmentSchedules',
      {
                'appointment_type_id': this.form.appointment_type_id,
                'is_schedule_required': this.form.is_schedule_required
        })).then(res => {
        this.schedule = res.data.data
        this.form.fee = this.schedule ? this.schedule.fee : null
        this.fetching = false
      });
    },
  submit() {
    this.form
       .post(this.route("lawyer.save_appointment_schedules"), {
          onSuccess: () => {
                       this.getAppointmentschedules()
                  }
      });
  },
  goToNextTab(){
          this.$inertia.visit(route('account'),{data:{active_tab:'broadcasts'}})
      }
},
created() {
    this.getAppointmentschedules();
  },
});
</script>

<style>

</style>
