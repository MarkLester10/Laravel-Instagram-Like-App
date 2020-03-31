<template>
  <div>
    <button class="btn btn-outline-success ml-4 btn-sm" v-on:click="followUser" v-text="buttonText"></button>
  </div>
</template>

<script>
export default {
  props: ["user-id", "follows"],

  mounted() {
    console.log("Component mounted.");
  },

  data: function() {
    return {
      status: this.follows
    };
  },
  methods: {
    followUser: function() {
      axios
        .post("/follow/" + this.userId)
        .then(response => {
          this.status = !this.status;
        })
        .catch(errors => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    }
  },
  computed: {
    buttonText: function() {
      return this.status ? "Unfollow" : "Follow";
    }
  }
};
</script>
