const Animate = () => {
  const els = document.querySelectorAll("[data-animate]");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate-show");
        }
      });
    },
    {
      rootMargin: "-30px",
    }
  );
  els.forEach((el) => {
    observer.observe(el);
  });
};
export default Animate;
