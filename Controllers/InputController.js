export default function sliceText(txt, limit) {
  return txt.length > limit ? txt.substr(0, limit) + "..." : txt;
}
export function timeAgo(timestampString) {
  const timestampDate = new Date(timestampString);
  const now = new Date();

  // Check for invalid date
  if (isNaN(timestampDate.getTime())) {
    return "Invalid date";
  }

  const diffInMs = now - timestampDate;

  // Handle future dates
  if (diffInMs < 0) {
    return "Just now";
  }

  const diffInSeconds = Math.floor(diffInMs / 1000);
  const diffInMinutes = Math.floor(diffInSeconds / 60);
  const diffInHours = Math.floor(diffInMinutes / 60);
  const diffInDays = Math.floor(diffInHours / 24);
  const diffInMonths = Math.floor(diffInDays / 30);
  const diffInYears = Math.floor(diffInDays / 365);

  if (diffInSeconds < 5) {
    return "Just now";
  } else if (diffInSeconds < 60) {
    return `${diffInSeconds} sec${diffInSeconds === 1 ? "" : "s"}`;
  } else if (diffInMinutes < 60) {
    return `${diffInMinutes} min${diffInMinutes === 1 ? "" : "s"}`;
  } else if (diffInHours < 24) {
    return `${diffInHours} hour${diffInHours === 1 ? "" : "s"}`;
  } else if (diffInDays < 30) {
    return `${diffInDays} day${diffInDays === 1 ? "" : "s"}`;
  } else if (diffInMonths < 12) {
    return `${diffInMonths} mo${diffInMonths === 1 ? "" : "s"}`;
  } else {
    return `${diffInYears} year${diffInYears === 1 ? "" : "s"}`;
  }
}
