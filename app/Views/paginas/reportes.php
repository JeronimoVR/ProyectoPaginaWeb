<?= $cabecera; ?>

<div class="row m-4 bg-light">
  <div class="col-2"></div>
  <div class="col-8">
    <div class="row text-center">
      <div class="col-12">
        <h4 class="m-2 text center">¿Cómo calificaría su experiencia con este sitio web?</h4>
      </div>
    </div>
    <canvas id="myChart1"></canvas>
  </div>
  <div class="col-2"></div>
</div>

<div class="row m-4 bg-light">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="row text-center">
      <div class="col-12">
        <h4 class="m-2 text center">¿Qué le falta a la página para mejorar?</h4>
      </div>
    </div>
    <canvas id="myChart2"></canvas>
  </div>
  <div class="col-3"></div>
</div>

<div class="row m-4 bg-light">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="row text-center">
      <div class="col-12">
        <h4 class="m-2 text center">El tema proporcionado, ¿le parce util y de interes?</h4>
      </div>
    </div>
    <canvas id="myChart3"></canvas>
  </div>
  <div class="col-3"></div>
</div>

<div class="row m-4 bg-light">
  <div class="col-2"></div>
  <div class="col-8">
    <div class="row text-center">
      <div class="col-12">
        <h4 class="m-2 text center">En general ¿cómo puntuaria este sitio web?</h4>
      </div>
    </div>
    <canvas id="myChart4"></canvas>
  </div>
  <div class="col-2"></div>
</div>

<div class="row m-4 bg-light">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="row text-center">
      <div class="col-12">
        <h4 class="m-2 text center">¿Recomendaria esta página a un amigo?</h4>
      </div>
    </div>
    <canvas id="myChart5"></canvas>
  </div>
  <div class="col-3"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  //Garafico 1
  let labels1 = <?= $labels1; ?>;
  let valores1 = <?= $valores1; ?>;
  const ctx1 = document.getElementById('myChart1');
  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: labels1,
      datasets: [{
        label: '# of Votes',
        data: valores1,
        borderWidth: 2,
        backgroundColor: [
          'rgba(255, 99, 132,0.5)',
          'rgba(0, 235, 235,0.5)',
          'rgba(54, 162, 235,0.5)',
          'rgba(163, 73, 164,0.4)',
          'rgba(255, 255, 0,0.4)',
        ]
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  //Garafico 2
  let labels2 = <?= $labels2; ?>;
  let valores2 = <?= $valores2; ?>;
  const ctx2 = document.getElementById('myChart2');
  new Chart(ctx2, {
    type: 'polarArea',
    data: {
      labels: labels2,
      datasets: [{
        label: '# of Votes',
        data: valores2,
        borderWidth: 2,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  //Garafico 3
  let labels3 = <?= $labels3; ?>;
  let valores3 = <?= $valores3; ?>;
  const ctx3 = document.getElementById('myChart3');
  new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: labels3,
      datasets: [{
        label: '# of Votes',
        data: valores3,
        borderWidth: 2
      }]
    },
    hoverOffset: 2
  });

  //Garafico 4
  let labels4 = <?= $labels4; ?>;

  function convertir(labels) {
    let stars = [];
    for (let i = 0; i < labels.length; i++) {
      if (labels[i] == 1) {
        stars.push('⭐')
      } else if (labels[i] == 2) {
        stars.push('⭐⭐')
      } else if (labels[i] == 3) {
        stars.push('⭐⭐⭐')
      } else if (labels[i] == 4) {
        stars.push('⭐⭐⭐⭐')
      } else if (labels[i] == 5) {
        stars.push('⭐⭐⭐⭐⭐')
      } else {
        stars.push('')
      }
    }
    return stars
  }
  let valores4 = <?= $valores4; ?>;
  const ctx4 = document.getElementById('myChart4');
  new Chart(ctx4, {
    type: 'line',
    data: {
      labels: convertir(labels4),
      datasets: [{
        label: '# of Votes',
        data: valores4,
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  //Garafico 5
  let labels5 = <?= $labels5; ?>;
  let valores5 = <?= $valores5; ?>;
  const ctx5 = document.getElementById('myChart5');
  new Chart(ctx5, {
    type: 'doughnut',
    data: {
      labels: labels5,
      datasets: [{
        label: '# of Votes',
        data: valores5,
        borderWidth: 2
      }]
    },
    hoverOffset: 2
  });
</script>

<?= $pie; ?>