export default function initBurger(): void {
  const burgerBtn = document.querySelector(".burger");
  const mobileNav = document.querySelector(".nav--mobile");
  if (burgerBtn instanceof HTMLElement && mobileNav instanceof HTMLElement) {
    burgerBtn.addEventListener('click', ()=>{mobileNav.classList.toggle('nav--mobile--active');});
  }
}
