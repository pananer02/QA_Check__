/* app.js */
import './bootstrap';  // สำหรับการตั้งค่าของ Laravel
import 'flowbite';      // ถ้าคุณใช้งาน flowbite
import DataTable from 'datatables.net-bs5'; // นำเข้า DataTable
import Alpine from 'alpinejs';  // ถ้าคุณใช้งาน Alpine.js

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    // ใช้งาน DataTable หลังจากที่ DOM โหลดเสร็จแล้ว
    $('#example').DataTable({
        paging: true,
        searching: true,
        lengthChange: false,
        pageLength: 10,
        language: {
            search: "ค้นหา:",  // การตั้งค่าคำค้นหา
            paginate: {
                next: 'ถัดไป',
                previous: 'ก่อนหน้า',
            },
            lengthMenu: "แสดง _MENU_ รายการ",
            info: "แสดงจาก _START_ ถึง _END_ ของ _TOTAL_ รายการ",
            zeroRecords: "ไม่พบข้อมูลที่ค้นหา",
        }
    });
});
