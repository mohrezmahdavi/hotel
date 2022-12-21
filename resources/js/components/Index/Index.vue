<template>
  <div class="row mt-5">
    <div class="col-md-12 mt-5">
      <div class="card">
        <div class="card-header">Search</div>
        <div class="card-body">
          <form class="row g-3" method="get">
            <div class="col"></div>
            <div class="col-md-12">
              <label for="city" class="visually-hidden">City Name</label>
              <v-select
                v-model="value"
                track-by="PlaceID"
                :options="citiesFinal"
                label="PlaceName"
                placeholder="City Name"
                width="200px"
                :dropdown-should-open="dropdownShouldOpen"
              />
              <input
                type="hidden"
                v-if="value != null"
                name="place_id"
                :value="value.PlaceID"
              />
            </div>
            <div class="col-md-12">
              <button
                type="button"
                @click="submitButton()"
                v-if="value != null"
                class="btn btn-primary mb-3"
              >
                Search
              </button>
              <button
                type="button"
                v-else
                disabled
                class="btn btn-primary mb-3"
              >
                Search
              </button>
            </div>
            <div class="col"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3" v-if="(selectedCity != null)">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Results City : {{ selectedCity }}</div>
        <div class="card-body">
          <div class="list-group">
            <li class="list-group-item list-group-item-action" v-if="(popularHotel != null)">
              The Most popular hotel in {{ popularHotel.PlaceName }} is {{ popularHotel.HotelName }}. Book now for
              {{ popularHotel.MinRate }}
            </li>
            <li class="list-group-item list-group-item-action" v-if="(cheapestHotel != null)">
              The cheapest hotel in {{ cheapestHotel.PlaceName }} is {{ cheapestHotel.HotelName }}. Book now for {{ cheapestHotel.MinRate }}
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import "vue-select/dist/vue-select.css";
import vSelect from "vue-select";
export default {
  props: ["cites"],
  components: {
    vSelect,
  },
  data() {
    return {
      value: null,
      citiesFinal: [],
      cheapestHotel: null,
      popularHotel: null,
      selectedCity : null,
    };
  },
  setup: () => ({
    title: "How To Install Vue 3 in Laravel 9 From Scratch",
  }),
  mounted() {
    this.citiesFinal = JSON.parse(this.cites);
  },
  methods: {
    dropdownShouldOpen(VueSelect) {
      if (this.value !== null) {
        return VueSelect.open;
      }

      return VueSelect.search.length !== 0 && VueSelect.open;
    },
    submitButton() {
      axios({
        method: "get",
        url: "/api/hotels?place_id=" + this.value.PlaceID,
      }).then((res) => {
        console.log(res.data.data);
        this.cheapestHotel = res.data.data.cheapest;
        this.popularHotel = res.data.data.popularity;
        this.selectedCity = this.value.PlaceName;
      });
    },
  },
};
</script>