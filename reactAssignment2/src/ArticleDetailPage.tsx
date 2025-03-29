import { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";

const baseUrl = "http://127.0.0.1:8000";

interface Article {
  article_id: number;
  title: string;
  body: string;
  create_date: string;
  start_date: string;
  end_date: string;
  contributor_username: string;
}

export function ArticleDetailPage() {
  const { id } = useParams<{ id: string }>(); // Use `useParams` to get the article ID from the URL
  const [article, setArticle] = useState<Article | null>(null);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string>("");
  const navigate = useNavigate();

  useEffect(() => {
    if (!id) {
      setError("Article ID is missing.");
      setLoading(false);
      return;
    }

    const fetchUrl = `${baseUrl}/api/articles?start_date=2025-01-25&end_date=2025-12-03&article_id=${id}`;

    fetch(fetchUrl)
      .then((response) => response.json())
      .then((data: Article[]) => {
        if (data.length > 0) {
          setArticle(data[0]); // Assuming the API returns only one article
        } else {
          setError("Article not found.");
        }
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error fetching article:", error);
        setError("An error occurred while fetching the article.");
        setLoading(false);
      });
  }, [id]);

  if (loading) {
    return <p>Loading...</p>;
  }

  if (error) {
    return <p>{error}</p>;
  }

  if (!article) {
    return <p>No article found.</p>;
  }

  // Remove <p> tags from the article's body content
  const cleanedBody = article.body.replace(/<\/?p>/g, "");

  return (
    <div style={{ maxWidth: "800px", margin: "0 auto", padding: "20px", fontFamily: "Arial, sans-serif" }}>
      <h1 style={{ fontSize: "28px", fontWeight: "bold", color: "#333" }}>{article.title}</h1>
      <p style={{ fontSize: "14px", color: "#777" }}>
        <strong>Created on:</strong> {article.create_date}
      </p>
      <p style={{ fontSize: "14px", color: "#777" }}>
        <strong>Start Date:</strong> {article.start_date} | <strong>End Date:</strong> {article.end_date}
      </p>
      <p style={{ fontSize: "14px", color: "#777" }}>
        <strong>Contributor:</strong> {article.contributor_username}
      </p>
      <div style={{ marginTop: "20px" }}>
        <h2 style={{ fontSize: "20px", fontWeight: "bold", marginBottom: "10px" }}>Article Content:</h2>
        {/* Use dangerouslySetInnerHTML to render the HTML content */}
        <div
          style={{
            whiteSpace: "pre-wrap", // Preserve line breaks
            lineHeight: "1.6",
            fontSize: "16px",
            color: "#333",
          }}
          dangerouslySetInnerHTML={{ __html: cleanedBody }}
        />
      </div>
      <button
        onClick={() => navigate("/")}
        style={{
          padding: "10px 20px",
          backgroundColor: "#007bff",
          color: "white",
          border: "none",
          borderRadius: "5px",
          cursor: "pointer",
          marginTop: "20px",
        }}
      >
        Back to Articles
      </button>
    </div>
  );
}
