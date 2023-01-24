const articleList = []; // In a real app this list would be full of articles.

// J'ai remplacé les var par des let pour respecter les nouvelles conventions,
// Les bonnes pratiques et éviter les problèmes liés à la portée

var kudos = 5;

// J'ai renommé le var kudos de la fonction en totalKudos pour éviter la confusion

function calculateTotalKudos(articles) {
  var kudos = 0;
  
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);
