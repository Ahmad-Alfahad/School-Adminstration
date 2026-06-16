import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";

window.Alpine = Alpine;

Alpine.start();
window.Swal = Swal;

window.confirmDelete = function (form) {
    Swal.fire({
        title: "Delete Record?",
        text: "This action cannot be undone and will permanently remove this data.",
        icon: "warning",
        iconColor: "#f43f5e", 
        showCancelButton: true,
        confirmButtonText: "Delete Record",
        cancelButtonText: "Cancel",

        buttonsStyling: false,

        customClass: {
            popup: "rounded-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-xl p-2 max-w-md",
            title: "text-xl font-bold text-slate-900 dark:text-slate-100 pt-3",
            htmlContainer:
                "text-sm text-slate-500 dark:text-slate-400 my-3 font-medium leading-relaxed",

            confirmButton:
                "bg-rose-600 hover:bg-rose-700 text-white text-sm font-semibold px-5 py-2.5  rounded-xl shadow-sm hover:shadow transition-all duration-200 mx-1.5  focus:ring-2 focus:ring-rose-500/20 cursor-pointer mb-3",

            cancelButton:
                "bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700/60 transition-all duration-200 mx-1.5 focus:ring-2 focus:ring-slate-500/10 cursor-pointer mb-3",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
};
