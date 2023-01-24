const articleList = []; // In a real app this list would be full of articles.
let kudos = 5;

function calculateTotalKudos(articles) {
  let totalKudos = 0;
  
  for (let article of articles) {
    totalKudos += article.kudos;
  }
  
  return totalKudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);
