async function handleProjectsRendering() {
  const container = document.querySelector('.news-list');
  const { count, perPage, result } = await getProjects();
  let currentRenderCount = perPage;
  container.innerHTML = result.slice(0, currentRenderCount).join('');
  currentRenderCount += perPage;

  document.querySelector('[data-more-projects]').addEventListener('click', async function (evt) {
    container.innerHTML = result.slice(0, currentRenderCount).join('');
    container.children[Math.min(currentRenderCount, result.length) - perPage].scrollIntoView({
      behaviour: 'smooth',
    });
    currentRenderCount += perPage;
    if (currentRenderCount > count) {
      this.style.display = 'none';
      document.querySelector('[data-more-projects-wrap]').style.display = 'none';
    }
  });
}

async function getProjects() {
  const fd = new FormData();
  fd.append('action', 'news');
  let data = await fetch('/wp-admin/admin-ajax.php', {
    method: 'POST',
    body: fd,
  });
  data = await data.json();
  return data;
}
handleProjectsRendering();
