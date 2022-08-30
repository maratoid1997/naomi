import Vue from "vue";

Vue.filter("truncate", (string, size) => {
  if (string && typeof string === "string") {
    const dots = string.length > size ? "..." : "";
    return string.substring(0, size) + dots;
  }
  return "";
});
