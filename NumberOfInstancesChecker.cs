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
            while (true) { 
            var FFmpegCounter = 0;
            Process[] processlist = Process.GetProcesses();
            foreach (Process theprocess in processlist)
            {
                System.Console.WriteLine(theprocess.ProcessName);
                if (theprocess.ProcessName == "ffmpeg")
                {

                    FFmpegCounter++;
                    System.Console.WriteLine(FFmpegCounter);
                }
            }

                using (StreamWriter sw = File.CreateText("C:\\xampp\\htdocs\\NumberOfInstances.txt"))
                {
                    sw.WriteLine(FFmpegCounter.ToString());
                }


            }

        }
    }
}
