<template>
  <div>
    <h2>Diseño del Curso</h2>
    <div>
      <router-link to="/course-design/weeks">Visualización por Semana</router-link>
      <router-link to="/course-design/resource">Visualización por Tipo de Recurso</router-link>
      <router-link to="/course-design/activity">Visualización por Tipo de Actividad</router-link>
      <router-link to="/course-design/general">Indicadores Generales</router-link>
    </div>
    <router-view />
  </div>
</template>

<script>
export default {
  name: "course-design"
}
</script>

<style scoped>

</style>