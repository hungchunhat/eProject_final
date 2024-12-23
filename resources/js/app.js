import './bootstrap';
import 'bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    const tickerContent = document.getElementById("ticker-content");

    // Hàm định dạng ngày giờ
    const getFormattedDateTime = () => {
        const now = new Date();
        const date = now.toLocaleDateString(); // Ngày
        const time = now.toLocaleTimeString(); // Giờ
        return `${date} ${time}`;
    };

    // Biến để lưu vị trí hiện tại
    let currentLocation = "Fetching location...";

    // Hàm cập nhật nội dung ticker
    const updateTickerContent = () => {
        const dateTime = getFormattedDateTime();
        tickerContent.textContent = `Current Date & Time: ${dateTime} | Location: ${currentLocation}`;
    };

    // Lấy vị trí của người dùng bằng Geolocation API
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const { latitude, longitude } = position.coords;
                currentLocation = `Lat: ${latitude.toFixed(2)}, Lon: ${longitude.toFixed(2)}`;
                updateTickerContent(); // Cập nhật nội dung ngay khi lấy được vị trí
            },
            (error) => {
                console.error("Geolocation Error:", error);
                currentLocation = "Unable to fetch location.";
                updateTickerContent();
            }
        );
    } else {
        currentLocation = "Geolocation not supported by your browser.";
        updateTickerContent();
    }

    // Cập nhật ngày & giờ liên tục, mỗi giây một lần
    setInterval(updateTickerContent, 1000);
});

