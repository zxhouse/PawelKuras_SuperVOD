using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Diagnostics;
using System.IO;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {

            var token = args[0];

            var oldLines_local = System.IO.File.ReadAllLines("C:\\xampp\\htdocs\\TokensWithError.txt");
            var newLines_local = oldLines_local.Where(line => !line.Contains(token));

            System.IO.File.WriteAllLines("C:\\xampp\\htdocs\\TokensWithError.txt", newLines_local);


            Process ffmpegProcess = new Process();
            ffmpegProcess.StartInfo.FileName = "C:\\xampp\\htdocs\\ffmpeg.exe";
            ffmpegProcess.StartInfo.CreateNoWindow = false;
            ffmpegProcess.StartInfo.Arguments = "-i uploads/" + token + " -vf subtitles=subtitles/" + token + " output/" + token + ".mp4";
            ffmpegProcess.Start();

            using (var sw = new StreamWriter("C:\\xampp\\htdocs\\ActuallyProcessedTokens.txt", append: true))
            {
                sw.WriteLine(token);
                sw.Close();
            }

            ffmpegProcess.WaitForExit();


            if (ffmpegProcess.ExitCode != 0)
            {

				File.Delete("C:\\xampp\\htdocs\\output\\" + token + ".mp4");
		
                var oldLines = System.IO.File.ReadAllLines("C:\\xampp\\htdocs\\ActuallyProcessedTokens.txt");
                var newLines = oldLines.Where(line => !line.Contains(token));

                System.IO.File.WriteAllLines("C:\\xampp\\htdocs\\ActuallyProcessedTokens.txt", newLines);

                using (var sw = new StreamWriter("C:\\xampp\\htdocs\\TokensWithError.txt", append: true))
                {
                    sw.WriteLine(token);
                    sw.Close();
                }

                


            }

            else

            {

                var oldLines = System.IO.File.ReadAllLines("C:\\xampp\\htdocs\\ActuallyProcessedTokens.txt");
                var newLines = oldLines.Where(line => !line.Contains(token));
                System.IO.File.WriteAllLines("C:\\xampp\\htdocs\\ActuallyProcessedTokens.txt", newLines);

            }


        }
    }
}
