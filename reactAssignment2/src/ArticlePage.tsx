import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import "./App.css";

const baseUrl = "http://127.0.0.1:8000";
const fetchUrl = `${baseUrl}/api/articles?start_date=2025-01-25&end_date=2025-12-31`;

interface Article {
  article_id: number;
  title: string;
  body: string;
  create_date: string;
  start_date: string;
  end_date: string;
  contributor_username: string;
}

export function ArticlesPage() {
  const [articles, setArticles] = useState<Article[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const navigate = useNavigate();

  useEffect(() => {
    fetch(fetchUrl)
      .then((response) => response.json())
      .then((data: Article[]) => {
        setArticles(data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error fetching articles:", error);
        setLoading(false);
      });
  }, []);

  return (
    <div className="articles-page-container">
      <h1 className="articles-header">Latest Articles</h1>
      {loading ? (
        <p className="loading-message">Loading...</p>
      ) : (
        <div className="articles-list">
          {articles.map((article) => (
            <div
              key={article.article_id}
              className="article-card"
            >
              <h2 className="article-title">{article.title}</h2>
              <p className="article-date">{article.create_date}</p>
              <p className="article-excerpt">
                {article.body.length > 100
                  ? article.body.substring(0, 100) + "..."
                  : article.body}
              </p>
              <p className="article-author">By {article.contributor_username}</p>
              <button
                className="read-more-button"
                onClick={() => navigate(`/articles/${article.article_id}`)}
              >
                Read More
              </button>
            </div>
          ))}
        </div>
      )}
    </div>
  );
}
