Dir["spec/**/*_spec.php"].each do |file|
  `php #{file}`
end