<style>
	.services-block-three{
  margin-bottom" 30px;
}
.services-block-three i {
    font-size: 32px;
}
.services-block-three>a {
    display: block;
    border: 2px solid #d5d5d5;
    border-radius: 4px;
    text-align: center;
    background: #fff;
    padding: 5px;
    position: relative;
  margin-bottom:30px;

}
.services-block-three>a:before {
    display: block;
    content: "";
    width: 9%;
    height: 17%;
    position: absolute;
    bottom: -2px;
    right: -2px;
    border-bottom: 2px solid #263544;
    border-right: 2px solid #263544;
    transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
}
.services-block-three>a:after {
    display: block;
    content: "";
    width: 9%;
    height: 17%;
    position: absolute;
    top: -2px;
    left: -2px;
    border-top: 2px solid #263544;
    border-left: 2px solid #263544;
    transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
}
.padding-15px-bottom {
    padding-bottom: 15px;
}
.services-block-three h4 {
    color: #6f6f6f;
    font-size: 14px;
    margin-bottom: 10px;
    font-weight: 600;
}
.services-block-three p {
    margin-bottom: 0;
  color: #757575;
}
.services-block-three>a:hover {
    opacity: 1;
    border-color: #d5d5d5;
}
a:hover, a:active {
    color: #263544;
    text-decoration: none;
}

.services-block-three>a:hover:before, .services-block-three>a:hover:after {
    width: 95%;
    height: 90%;
}
</style>
<div id="page-container" class="sidebar_open">
    <div class="section my-shadow">
        <div class="mt-3">
            <div class="row">
                <div class="services-block-three col-lg-3 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                    <div class="services-block-three">
                        <a href="javascript:void(0)">
                            <div class="padding-15px-bottom">
                                <i class="fa fa-braille"></i>
                            </div>
                            <h4>Employees</h4>
                            <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>
                        </a>
                    </div>
                </div>
                <div class="services-block-three col-lg-3 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                    <div class="services-block-three">
                        <a href="javascript:void(0)">
                            <div class="padding-15px-bottom">
                                <i class="fa fa-braille"></i>
                            </div>
                            <h4>Employees</h4>
                            <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>
                        </a>
                    </div>
                </div>
                <div class="services-block-three col-lg-3 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                    <div class="services-block-three">
                        <a href="javascript:void(0)">
                            <div class="padding-15px-bottom">
                                <i class="fa fa-braille"></i>
                            </div>
                            <h4>Employees</h4>
                            <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>
                        </a>
                    </div>
                </div>
                <div class="services-block-three col-lg-3 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                    <div class="services-block-three">
                        <a href="javascript:void(0)">
                            <div class="padding-15px-bottom">
                                <i class="fa fa-braille"></i>
                            </div>
                            <h4>Employees</h4>
                            <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>
                        </a>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="section my-shadow mt-3">
				<canvas id="chart_1"></canvas>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="section my-shadow mt-3">
				<canvas id="chart_2"></canvas>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="section my-shadow mt-3">
				<canvas id="chart_3"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
			<div class="section my-shadow mt-3">
				<canvas id="chart_4"></canvas>
			</div>
		</div>
        <div class="col-lg-6 col-md-6">
            <div class="section my-shadow mt-3">
				<canvas id="chart_5"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx_1 = document.getElementById('chart_1').getContext('2d');
const chart_1 = new Chart(ctx_1, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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

const ctx_2 = document.getElementById('chart_2').getContext('2d');
const chart_2 = new Chart(ctx_2, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
const ctx_3 = document.getElementById('chart_3').getContext('2d');
const chart_3 = new Chart(ctx_3, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
const ctx_4 = document.getElementById('chart_4').getContext('2d');
const chart_4 = new Chart(ctx_4, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
const ctx_5 = document.getElementById('chart_5').getContext('2d');
const chart_5 = new Chart(ctx_5, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
</script>