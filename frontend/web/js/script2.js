const videoObserver = new IntersectionObserver(
    ([entry]) => {
      const road = entry.target || {};
      if (road.currentTime !== 0) {
        if (!entry.isIntersecting || entry.intersectionRatio <= 0.2) {
          document.querySelector('#tds-site-header').classList.remove('road-white');
        } else {
          document.querySelector('#tds-site-header').classList.add('road-white');
        }
      }
    },
    {
      threshold: [0.2, 0.8]
    }
  );
  
  document.querySelectorAll(".road-observer").forEach((road) => videoObserver.observe(road));