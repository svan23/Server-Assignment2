import { createBrowserRouter } from "react-router-dom";
import { ArticlesPage } from "../ArticlePage";
import { ArticleDetailPage } from "../ArticleDetailPage";
import App from "../App";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <ArticlesPage />,
  },
  {
    path: "/articles/:id",  // This is the new route with path parameter
    element: <ArticleDetailPage />,
  },
]);
