import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ✅ Filtros “chips” de cachorros (Home)
document.addEventListener("DOMContentLoaded", () => {
  const filtrosWrap = document.getElementById("cachorros-filtros");
  if (!filtrosWrap) return; // solo corre en páginas que lo tengan

  const filtros = [...filtrosWrap.querySelectorAll(".rz-filter")];
  const cards = [...document.querySelectorAll("[data-cachorro-card]")];

  const setActive = (btn) => {
    filtros.forEach(b => {
      b.classList.remove("bg-[#e7f3e9]", "text-[#0d1b10]");
      b.classList.add("bg-white", "text-slate-600", "border", "border-[#e7f3e9]");
    });

    btn.classList.remove("bg-white", "text-slate-600", "border", "border-[#e7f3e9]");
    btn.classList.add("bg-[#e7f3e9]", "text-[#0d1b10]");
  };

  const applyFilter = (filter) => {
    cards.forEach(card => {
      const estado = (card.dataset.estado || "").toLowerCase();

      const isDisponible = estado === "disponible";
      const isNoDisponible = estado === "reservado" || estado === "entregado";

      let show = true;

      if (filter === "disponible") show = isDisponible;
      if (filter === "no_disponible") show = isNoDisponible;
      if (filter === "all") show = true;

      card.classList.toggle("hidden", !show);
    });
  };

  filtros.forEach(btn => {
    btn.addEventListener("click", () => {
      const filter = btn.dataset.filter;
      setActive(btn);
      applyFilter(filter);
    });
  });

  // estado inicial
  applyFilter("all");
});