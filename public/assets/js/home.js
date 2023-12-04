$(document).ready(function () {
    loaddata();
});

function loaddata() {
    $.ajax({
        method: 'GET',
        url: 'https://take-home-test-api.nutech-integrasi.app/services',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: function (response) {
            const services = response.data;
            const servicesMenu = document.getElementById('services-menu');
            for (let i = 0; i < services.length; i++) {
                const service = document.createElement("div");
                service.setAttribute("class", "icon-services");
                service.setAttribute("name", services[i].service_code+'/'+services[i].service_tariff+'/'+services[i].service_name);
                service.innerHTML = `<img src="${services[i].service_icon}" alt="">
                <p>${services[i].service_name}</p>`;
                servicesMenu.append(service);
            }
            
        }
    });
    $.ajax({
        method: 'GET',
        url: 'https://take-home-test-api.nutech-integrasi.app/banner',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: function (response) {
            const banners = response.data;
            const bannerMenu = document.getElementById('banner-menu');
            const banner = document.createElement("div");
            let bannerItem = "";
            banner.setAttribute("class", "banner-menu mt-4");
            for (let i = 0; i < banners.length; i++) {
                bannerItem += `<img src="${banners[i].banner_image}" alt="" name="${banners[i].banner_name}">`;
            }
            banner.innerHTML = bannerItem;
            bannerMenu.append(banner);
        }
    });
}